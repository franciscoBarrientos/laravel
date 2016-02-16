<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Requests\ClientCreateRequest;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Client;
use Veterinaria\Pet;

class ClientController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::Search($request->name)->paginate(10);
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Veterinaria\Http\Requests\ClientCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateRequest $request)
    {
        //return "Exito";
        Client::create([
              'name'        => $request['name']
            , 'lastname'  => $request['lastname']
            , 'rut'         => $request['rut']
            , 'address'   => $request['address']
            , 'cellphone'   => $request['cellphone']
            , 'phone'       => $request['phone']
            , 'email'       => $request['email']
        ]);

        Session::flash('message', 'Cliente creado correctamente');
        return Redirect::to('/client');
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
        $client = Client::find($id);

        return view('client.edit', ['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Veterinaria\Http\Requests\ClientCreateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientCreateRequest $request, $id)
    {
        $client = Client::find($id);
        $client -> fill($request->all());
        $client -> save();

        Session::flash('message', 'Cliente editado correctamente');
        return Redirect::to('/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminate first his pet
        $clientPets = Pet::getPetByClientId($id);

        foreach($clientPets as $clientPet){;
            $clientPet -> delete();
        }

        $client = Client::find($id);
        $client  -> delete();

        Session::flash('message', 'Cliente eliminado correctamente');
        return Redirect::to('/client');
    }

}
