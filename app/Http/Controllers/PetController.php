<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Veterinaria\Breed;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Requests\PetCreateRequest;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Pet;
use Veterinaria\Species;
use Veterinaria\Client;
use Veterinaria\Ticket;

class PetController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetCreateRequest $request)
    {
        Pet::create([
               'name' => $request['name']
            , 'client_id' => $request['client_id']
            , 'sex' => $request['sex']
            , 'birth_date' => $request['birth_date']
            , 'breed_id' => $request['breed_id']
            , 'record_number' => $request['record_number']
        ]);
        Session::flash('message', 'Mascota creada correctamente');
        return Redirect::to('/pet/'.$request['client_id'].'/index');
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
        $pet = Pet::find($id);
        $clientId = Client::find($pet->client_id)->id;
        $breed = Breed::find($pet->breed_id);
        $breedsList = Breed::breeds($breed->species_id)->lists('name', 'id');
        $species = Species::lists('species', 'id');
        $specie_id = $breed->species_id;

        return view('pet.edit',compact('pet','breedsList','species','specie_id','clientId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\PetCreateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PetCreateRequest $request, $id)
    {
        $pet = Pet::find($id);
        $pet -> fill($request->all());
        $pet -> save();

        Session::flash('message', 'Mascota ' . $pet->name .' editado correctamente');
        return Redirect::to('/pet/'.$pet->client_id.'/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
        $pet -> delete();

        Session::flash('message', 'La mascota ' . $pet->name . ' fue eliminada correctamente');
        return Redirect::to('/pet/' . $pet->client_id . '/index');

    }

    public function createPetByClient($id){
        //To create pet by client
        $client = Client::find($id);
        $species = Species::lists('species', 'id');
        $number = Pet::max('record_number');

        if($number == null){
            $number = 1;
        }else{
            $number++;
        }

        return view('pet.create', compact('client','species','number'));
    }

    public function indexPetsByClient($id){
        $client = Client::find($id);
        $pets = Pet::where('client_id','=', $id)-> paginate(10);
        return view('pet.index', compact('client','pets'));
    }
}
