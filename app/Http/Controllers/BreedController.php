<?php

namespace Veterinaria\Http\Controllers;

use DB;
use Illuminate\Http\Request;
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
        $this -> middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breeds = Breed::Search($request->name)->paginate(10);
        return view('breed.index', compact('breeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listSpecies = Species::lists('species', 'id');
        $species_id = null;
        return view('breed.create', ['listSpecies' => $listSpecies,  'species_id' => $species_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\BreedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreedRequest $request)
    {
        //
        Breed::Create([
            'name' => $request['name']
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
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\BreedRequest $request
     * @param  int $id
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
