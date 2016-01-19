<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\TicketPaidRequest;
use Veterinaria\Product;
use Veterinaria\RecordTypeStock;
use Veterinaria\Stock;
use Veterinaria\Ticket;
use Veterinaria\TicketProduct;

class TicketController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('canceled', '=', 0)->paginate(10);
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $number = Ticket::all()->last()->number + 1;
        $canceled = 0;

        Ticket::Create([
            'number'       => $number
            ,'canceled'    => $canceled
        ]);

        $ticket = Ticket::all()->last();

        for($i = 0; $i <= $request->detailNumber; $i++){
            if($request->{"id".$i} != null){
                $product = Product::find($request->{"id".$i});
                $quantity = $request->{"quantity".$i};
                $subtotal = ($quantity * $product->price);

                TicketProduct::Create([
                    'ticket_id' => $ticket->id
                    ,'description' => $product->name
                    ,'quantity' => $quantity
                    ,'price' => $product->price
                    ,'subtotal' => $subtotal
                ]);

                $ticket = Ticket::all()->last();

                $recordTypeStock = RecordTypeStock::find("2");

                Stock::Create([
                    'invoice_number' => $ticket->number
                    ,'quantity' => $quantity
                    ,'product_id' => $product->id
                    ,'record_type_stock_id' => $recordTypeStock->id
                ]);

                $product -> quantity = ($product -> quantity - $quantity);
                $product -> save();
            }
        }

        Session::flash('message', 'Boleta generada correctamente');
        return Redirect::to('/ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$ticket = Ticket::find($id);
        return view('ticket.edit', compact('ticket'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket -> canceled = 1;
        $ticket -> save();

        Session::flash('message', 'Boleta anulada correctamente');
        return Redirect::to('/ticket');
    }

    public function detail($id){
        $products = TicketProduct::searchByTicketId($id)->orderBy('created_at')->get();
        $date = date('Y-m-d');

        $view =  View::make('ticket.detail', compact('products', 'date', 'id'))->render();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download("Boleta-".$id."-".$date.".pdf");
        //return view('ticket.detail', compact('tickets'));
    }

    public function paid($id){
        $ticket = Ticket::find($id);

        $ticket->paid = 1;
        $ticket->save();
        Session::flash('message', 'Boleta '+$ticket->id+' fue pagada');
        return Redirect::to('/ticket');
    }
}
