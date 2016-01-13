<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Requests\BreedRequest;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Breed;
use Veterinaria\Species;

class BreedController extends Controller
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
        $breeds = DB::table('breeds')
            -> orderBy('name', 'asc')
            -> paginate(10);
        $speciesList = DB::table('species')
            -> paginate(10);

        return view('breed.index', ['breeds' => $breeds, 'speciesList' => $speciesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listSpecies = Species::lists('species', 'id');
        $species_id = null;
        return view('breed.create', ['listSpecies' => $listSpecies,  'species_id' => $species_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreedRequest $request)
    {
        //
        Breed::Create([
            'name' => strtoupper($request['name'])
            , 'species_id' => $request['species_id']
        ]);

        Session::flash('message', 'Raza creada correctamente');
        return Redirect::to('/breed');
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
        $breed = Breed::find($id);
        $listSpecies = Species::lists('species', 'id');
        $species_id = $breed['species_id'];

        return view('breed.edit', ['breed'=>$breed
            , 'listSpecies' => $listSpecies
            , 'species_id' => $species_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BreedRequest $request, $id)
    {
        //
        $breed = Breed::find($id);
        $breed -> fill($request->all());
        $breed['name'] = strtoupper($breed['name']);
        $breed -> save();

        Session::flash('message', 'Raza ' . $breed->name .' editada correctamente');
        return Redirect::to('/breed');
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
        Breed::destroy($id);

        Session::flash('message', 'Raza eliminada correctamente');
        return Redirect::to('/breed');
    }
}
