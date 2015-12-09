<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Client;
use Veterinaria\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::All();
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
    public function store(Request $request)
    {
        //return "Exito";
        Client::create([
            'client_name' => $request['name']
            , 'client_last_name_p' => $request['lastNamePat']
            , 'client_last_name_m' => $request['lastNameMat']
            , 'client_rut' => $request['rut']
            , 'client_direction' => $request['direction']
            , 'client_cellphone' => $request['cellphone']
            , 'client_phone' => $request['phone']
        ]);

        return redirect('/cliente')->with('message', 'store');
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
}
