<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Veterinaria\Atention;
use Veterinaria\AtentionType;
use Veterinaria\Breed;
use Veterinaria\Client;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\AtentionRequest;
use Veterinaria\Species;
use Veterinaria\Pet;
use Veterinaria\Ticket;
use Veterinaria\TicketProduct;

class AtentionController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Controllers\AtentionRequest|\Veterinaria\Http\Requests\AtentionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtentionRequest $request)
    {
        $atentionsType = AtentionType::find($request['atentions_type_id']);

        $ticket = \Veterinaria\Ticket::all()->last();

        if($ticket == null){
            $number = 1;
        }else{
            $number = ($ticket->number) + 1;
        }

        $canceled = 0;

        Ticket::Create([
            'number'       => $number
            ,'canceled'    => $canceled
        ]);

        $ticket = Ticket::all()->last();

        TicketProduct::Create([
            'ticket_id' => $ticket->id
            ,'description' => $atentionsType->description
            ,'quantity' => 1
            ,'price' => $atentionsType->price
            ,'subtotal' => $atentionsType->price
        ]);

        Atention::create([
            'pet_id'   =>  $request['pet_id']
            ,'atentions_type_id'   =>  $request['atentions_type_id']
            ,'procedure'   =>  $request['procedure']
            ,'treatment'   =>  $request['treatment']
            ,'diagnosis'   =>  $request['diagnosis']
            ,'prescription'  =>  $request['prescription']
            ,'ticket_id'   =>  $ticket->id
        ]);

        Session::flash('message', 'La atención fue creada correctamente');
        return Redirect::to('atention/'.$request['pet_id'].'/index');
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
        $atention = Atention::find($id);
        $pet = Pet::find($atention->pet_id);
        $client = Client::find($pet->client_id);
        $breed = Breed::find($pet->breed_id);
        $specie = Species::find($breed->species_id);
        $atentionsType = AtentionType::lists('description','id')->all();
        $date = UtilsController::calculateAge($pet->birth_date);

        return view('atention.edit', compact('atention','client','pet','breed','specie','atentionsType','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\AtentionRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtentionRequest $request, $id)
    {
        $atention = Atention::find($id);
        $atention -> fill($request->all());
        $atention -> save();

        Session::flash('message', 'Atención editada correctamente');
        return Redirect::to('atention/'.$request['pet_id'].'/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add($petId){
        $pet = Pet::find($petId);
        $client = Client::find($pet->client_id);
        $breed = Breed::find($pet->breed_id);
        $specie = Species::find($breed->species_id);
        $atentionsType = AtentionType::lists('description','id')->all();
        $date = UtilsController::calculateAge($pet->birth_date);

        return view('atention.create', compact('pet','client','breed','specie','atentionsType','date'));
    }

    public function indexByPetId($petId){
        $atentions = Atention::getAtentionsByPetId($petId)->paginate(10);
        $pet = Pet::find($petId);
        $client = Client::find($pet->client_id);
        $date = UtilsController::calculateAge($pet->birth_date);
        $breed = Breed::find($pet->breed_id);
        $specie = Species::find($breed->species_id);
        return view('atention.index', compact('atentions','client','pet','date','breed','specie'));
    }

    public function pdf($id){
        $atention = Atention::find($id);
        $pet = Pet::find($atention->pet_id);
        $age = UtilsController::calculateAge($pet->birth_date);
        $breed = Breed::find($pet->breed_id);
        $specie = Species::find($breed->species_id);
        $client = Client::find($pet->client_id);
        $view =  View::make('atention.pdf', compact('atention','pet','age','breed','specie','client'))->render();

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML($view);

       $nameFile = "Receta-".$pet->name."-".$atention->created_at->format('Y-m-d').".pdf";

        return $pdf->download($nameFile);
    }
}
