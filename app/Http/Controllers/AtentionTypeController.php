<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\AtentionType;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\AtentionTypeRequest;

class AtentionTypeController extends Controller
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
        $atentionsType = AtentionType::Search($request->description)->paginate(10);
        return view('atentionType.index', compact('atentionsType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atentionType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\AtentionTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtentionTypeRequest $request)
    {
        AtentionType::create([
            'description'   =>  $request['description'],
            'price'   =>  $request['price']
        ]);

        Session::flash('message', 'El tipo de atención fue creado correctamente');
        return Redirect::to('/atentionType');
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
        $atentionType = AtentionType::find($id);

        return view('atentionType.edit', compact('atentionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\AtentionTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtentionTypeRequest $request, $id)
    {
        $client = AtentionType::find($id);
        $client -> fill($request->all());
        $client -> save();

        Session::flash('message', 'Tipo de atención editado correctamente');
        return Redirect::to('/atentionType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atentionType = AtentionType::find($id);

        $atentionType -> delete();

        Session::flash('message', 'Tipo de atención eliminado correctamente');
        return Redirect::to('/atentionType');
    }
}
