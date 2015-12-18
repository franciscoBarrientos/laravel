<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Requests\ClientCreateRequest;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //comments to use pagination
        //$clients = Client::All();
        $clients = Client::paginate(2);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateRequest $request)
    {
        //return "Exito";
        Client::create([
            'client_name' => $request['client_name']
            , 'client_last_name_p' => $request['client_last_name_p']
            , 'client_last_name_m' => $request['client_last_name_m']
            , 'client_rut' => $request['client_rut']
            , 'client_direction' => $request['client_direction']
            , 'client_cellphone' => $request['client_cellphone']
            , 'client_phone' => $request['client_phone']
        ]);

        Session::flash('message', 'Cliente creado correctamente');
        return Redirect::to('/cliente');
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
        $client = Client::find($id);

        return view('client.edit', ['client'=>$client]);
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
        $client = Client::find($id);
        $client -> fill($request->all());
        $client -> save();

        Session::flash('message', 'Cliente editado correctamente');
        return Redirect::to('/cliente');
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
        Client::destroy($id);

        Session::flash('message', 'Usuario eliminado correctamente');
        return Redirect::to('/cliente');
    }
}

?>