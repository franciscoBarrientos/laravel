<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\Administrator;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\User;

class AdministratorController extends Controller
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

        $users = User::all();
        $administrators = Administrator::Search($request->name)->paginate(10);
        return view('administrator.index', compact('administrators','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userList = DB::table('users')
                    ->leftJoin('administrators', 'users.id', '=', 'administrators.user_id')
                    ->select('users.id', 'users.name')
                    ->whereNull('administrators.user_id')
                    ->get();

        return view('administrator.create',compact('userList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Administrator::Create([
            'user_id' => $request['user_id']
        ]);

        Session::flash('message', 'Administrador creado correctamente');
        return Redirect::to('/administrator');
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
        return Redirect::to('/administrator');
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
        Administrator::destroy($id);
        Session::flash('message','Administrador Eliminado Correctamente');
        return Redirect::to('/administrator');
    }
}
