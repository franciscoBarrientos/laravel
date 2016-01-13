<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Ticket;
use Veterinaria\TicketProduct;

class TicketController extends Controller
{
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
                TicketProduct::Create([
                    'ticket_id' => $ticket->id
                    ,'description' => $request->{"name".$i}
                    ,'quantity' => $request->{"quantity".$i}
                    ,'price' => $request->{"price".$i}
                    ,'subtotal' => $request->{"subtotal".$i}
                ]);
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
        $ticket = Ticket::find($id);
        return view('ticket.edit', compact('ticket'));
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
        $tickets = TicketProduct::searchByTicketId($id)->orderBy('created_at')->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');

        $date = date('Y-m-d');

        return $pdf->download("Boleta-".$id."-".$date.".pdf");
        //return view('ticket.detail', compact('tickets'));
    }
}
