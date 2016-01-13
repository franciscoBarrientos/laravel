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
        $pets = Pet::paginate(10);
        return view('pet.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$listSpecies = Species::lists('species', 'id');
        $listBreeds = Breed::lists('species_id' , 'name', 'id');
        $species_id = null;
        //return view('pet.create', ['listSpecies' => $listSpecies, 'species_id' => $species_id]);
        return view('pet.create', ['listBreeds' => $listBreeds, 'species_id' => $species_id]);
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
//        return dd($date);
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
        $pet = Pet::find($id);

        return view('pet.edit',['pet' => $pet]);
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
        //
        $pet = Pet::find($id);
        $pet -> delete();

        Session::flash('message', 'La mascota ' . $pet->name . ' fue eliminada correctamente');
        return Redirect::to('/pet/' . $pet->client_id . '/index');

    }

    public function createPetByClient($id){
        //To create pet by client
        $client = Client::find($id);
        $breedsList = Breed::lists('name', 'id');
        $breed_id = null;
        $birthDate = null;
        //return dd($breedsList);
        return view('pet.create', ['client' => $client
            , 'breedsList' => $breedsList
            , 'breed_id' => $breed_id
            , 'birthDate' => $birthDate
        ]);
    }

    public function indexPetsByClient($id){
        //$pets = Pet::paginate(10);

        $client = Client::find($id);
        $pets = DB::table('pets')
            -> where('client_id', $id)
            -> paginate(10);

/*        $speciesList = DB::table('species')
            -> paginate(10);
*/
        $breedsList = DB::table('breeds')
            -> paginate(10);

        return view('pet.index', ['client' => $client, 'pets' => $pets, 'breedsList' => $breedsList] );
    }

    public function editPetByClient($clientId, $petId){
        $pet = Pet::find($petId);
        $client = Client::find($clientId);
        $breedsList = Breed::lists('name', 'id');
        $breed_id = $pet['breed_id'];
        $sex = $pet['sex'];
        $birthDate = $pet['birth_date'];

        return view('pet.edit',['pet' => $pet
            , 'client' => $client
            , 'breedsList' => $breedsList
            , 'breed_id' => $breed_id
            , 'sex' => $sex
            , 'birthDate' => $birthDate
        ]);
    }
}
