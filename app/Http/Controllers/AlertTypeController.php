<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\AlertType;
use Veterinaria\FontAwesome;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\AlertTypeRequest;

class AlertTypeController extends Controller
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
    public function index()
    {
        $alertTypes = AlertType::paginate(10);
        return view('alertType.index', compact('alertTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $color = UtilsController::getColorButtonList();
        $icons = FontAwesome::lists('font','id');
        $columnsNumber = 5;
        $fontPixelSize = 30;
        $html = UtilsController::generateFontAwesomeHtml($icons, $columnsNumber, $fontPixelSize);
        $icon = null;
        return view('alertType.create',compact('color','html','icon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\AlertTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlertTypeRequest $request)
    {
        AlertType::Create([
            'title' => $request['title']
            , 'font_awesome_id' => $request['font_awesome_id']
            , 'color' => $request['color']
        ]);

        Session::flash('message', 'Tipo de alerta creado correctamente');
        return Redirect::to('/alertType');
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
        $alertType = AlertType::find($id);
        $color = UtilsController::getColorButtonList();
        $icons = FontAwesome::lists('font','id');

        $columnsNumber = 5;
        $fontPixelSize = 30;
        $html = UtilsController::generateFontAwesomeHtml($icons, $columnsNumber, $fontPixelSize);

        $icon = $alertType->font_awesome_id;

        return view('alertType.edit', compact('alertType','color','icon','html'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request|\Veterinaria\Http\Requests\AlertTypeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlertTypeRequest $request, $id)
    {
        $alertType = AlertType::find($id);
        $alertType -> fill($request->all());
        $alertType -> save();

        Session::flash('message', 'Tipo de alerta editado correctamente');
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
        $alertType = AlertType::find($id);
        $alertType  -> delete();

        Session::flash('message', 'Tipo de alerta eliminado correctamente');
        return Redirect::to('/alertType');
    }
}
