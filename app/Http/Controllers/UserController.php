<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veterinaria\Administrator;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\UserCreateRequest;
use Veterinaria\Http\Requests\UserUpdateRequest;
use Veterinaria\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

class UserController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
        $this -> middleware('admin', ['only' => ['index','create','destroy']]);
        $this -> beforeFilter('@find',['only' => ['edit','update','destroy']]);
        $this -> beforeFilter('@auth',['only' => ['edit','update']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('user'));
        $this->notFound($this->user);
    }

    public function auth(){
        $this->adminFlag = false;
        $this->userAuth = false;

        if(Administrator::administrator(Auth::user()->id)){
            $this->adminFlag = true;
        }

        if($this->user->id == Auth::user()->id){
            $this->userAuth = true;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::Search($request->name)->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Veterinaria\Http\Requests\UserCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        User::Create([
              'name' => $request['name']
            , 'email' => $request['email']
            , 'password' => $request['password']
        ]);

        Session::flash('message', 'Usuario creado correctamente');
        return Redirect::to('/user');
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
        if($this->userAuth || $this->adminFlag){
            return view('user.edit', ['user'=>$this->user]);
        }else{
            Session::flash('message-error','Sin privilegios de administrador');
            return Redirect::to('/home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Veterinaria\Http\Requests\UserUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        if($this->userAuth || $this->adminFlag){
            $this->user -> fill($request->all());
            $this->user -> save();

            $path = 'message';
            $message = 'Usuario editado correctamente';

            if($this->userAuth){
                $route = '/home';
            }else{
                $route = '/user';
            }
        }else{
            $path = 'message-error';
            $message = 'Sin privilegios de administrador';
            $route = '/home';
        }

        Session::flash($path,$message);
        return Redirect::to($route);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->delete();
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/user');
    }
}
