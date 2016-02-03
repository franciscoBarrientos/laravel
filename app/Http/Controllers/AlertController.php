<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\Alert;
use Veterinaria\AlertType;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Pet;

class AlertController extends Controller
{
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
    public function store(Request $request)
    {
        Alert::Create([
              'alerts_type_id' => $request['alerts_type_id']
            , 'pets_id' => $request['pets_id']
            , 'description' => $request['description']
            , 'date' => $request['date']
        ]);

        Session::flash('message', 'Alerta creada correctamente.');
        return Redirect::to('/alert/'.$request['pets_id'].'/index');
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
        $alert = Alert::find($id);
        $pet = Pet::find($alert->pets_id);
        $alertsType = AlertType::lists('title','id');

        return view('alert.edit', compact('alert','pet','icon','alertsType'));
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
        $alert = Alert::find($id);
        $alert -> fill($request->all());
        $alert -> save();

        Session::flash('message', 'Alerta editada correctamente');
        return Redirect::to('/alertType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alert = Alert::find($id);
        $alert -> delete();

        Session::flash('message', 'La alerta fue eliminada correctamente');
        return Redirect::to('/alert/' . $alert->pets_id . '/index');
    }

    public function add($petId){
        $pet = Pet::find($petId);
        $alertsType = AlertType::lists('title','id');

        return view('alert.create', compact('pet','alertsType'));
    }

    public function alertIndex($petId){
        $pet = Pet::find($petId);
        $alerts = Alert::getAlertsByPetId($petId)->paginate(10);

        return view('alert.index', compact('pet','alerts'));
    }
}
