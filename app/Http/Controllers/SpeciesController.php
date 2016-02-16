<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
use Veterinaria\Breed;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\SpeciesRequest;
use Veterinaria\Species;

class SpeciesController extends Controller
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
        //
        $speciesList = Species::Search($request->species)->paginate(10);
        return view('species.index', compact('speciesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('species.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpeciesRequest $request)
    {
        //
        Species::Create([
            'species' => strtoupper($request['species'])
        ]);
        Session::flash('message', 'Especie creada correctamente');
        return Redirect::to('/species');
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
        $species = Species::find($id);

        return view('species.edit', ['species'=>$species]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpeciesRequest $request, $id)
    {
        //
        $species = Species::find($id);
        $species -> fill($request->all());
        $species['species'] = strtoupper($species['species']);
        $species -> save();

        Session::flash('message', 'Especie editada correctamente');
        return Redirect::to('/species');
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
        Species::destroy($id);

        Session::flash('message', 'Especie eliminada correctamente');
        return Redirect::to('/species');
    }

    public function getBreeds(Request $request, $id){
        if($request->ajax()){
            $breeds = Breed::breeds($id);
            return response()->json($breeds);
        }

        return null;
    }
}
