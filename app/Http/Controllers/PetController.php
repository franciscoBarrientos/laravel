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
        //
        $date = $request['birthDate'];
        $date = Carbon::createFromFormat('Y-m-d', $date);
        Pet::create([
            'name' => strtoupper($request['name'])
            , 'client_id' => $request['client_id']
            , 'sex' => $request['sex']
            , 'birth_date' => $date
            , 'breed_id' => $request['breed_id']
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PetCreateRequest $request, $id)
    {
        //
        $pet = Pet::find($id);
        $request['birthDate'] = Carbon::createFromFormat('Y-m-d', $request['birthDate']);
        $pet['birth_date'] = $request['birthDate'];
        $pet -> fill($request->all());
        $pet -> save();

        Session::flash('message', 'Mascota ' . $pet->name .' editado correctamente');
        return Redirect::to('/pet/'.$pet->client_id.'/index');
        //return dd( $request['birthDate']);
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
        //$breedsList = Breed::lists('name', 'id');
        $species = Species::lists('species', 'id');
        $breed_id = null;
        $birthDate = null;

        return view('pet.create', ['client' => $client
            //, 'breedsList' => $breedsList
            , 'species' => $species
            , 'breed_id' => $breed_id
            , 'birthDate' => $birthDate
        ]);
    }

    public function indexPetsByClient($id){
        $client = Client::find($id);
        $pets = Pet::where('client_id','=', $id)-> paginate(10);

        return view('pet.index', compact('client','pets'));
    }

    public function editPetByClient($clientId,$petId){
        $pet = Pet::find($petId);
        $client = Client::find($clientId);
        $breed = Breed::find($pet->breed_id);
        $breedsList = Breed::breeds($breed->species_id)->lists('name', 'id');
        $breed_id = $pet->breed_id;
        $species = Species::lists('species', 'id');
        $specie_id = $breed->species_id;
        $sex = $pet->sex;
        $birthDate = $pet->birth_date;

        return view('pet.edit',compact('pet','client','breedsList','breed_id','species','specie_id','sex', 'birthDate'));
    }
}
