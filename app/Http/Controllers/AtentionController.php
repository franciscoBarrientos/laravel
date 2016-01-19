<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Veterinaria\Atention;
use Veterinaria\AtentionType;
use Veterinaria\Breed;
use Veterinaria\Client;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Species;
use Veterinaria\Pet;

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
        $atentions = Atention::paginate(10);

        return view('atention.index', compact('atentions'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function findPetsByClient(){
        $pets = Pet::paginate(10);
        $client = null;
        dd($pets);
    }

    public function add($clientId,$petId){
        $pet = Pet::find($petId);
        $client = Client::find($clientId);
        $breed = Breed::find($pet->breed_id);
        $specie = Species::find($breed->species_id);
        $atentionsType = AtentionType::lists('description','id')->all();

        return view('atention.create', compact('pet','client','breed','specie','atentionsType'));
    }
}
