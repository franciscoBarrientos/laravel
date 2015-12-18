<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;

class FrontController extends Controller{

    public function __construct(){
        $this -> middleware('auth', ['only' => 'home']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
    }

   /*
    public function contact()
    {
        return view('contact');
    }

    public function reviews()
    {
        return view('reviews');
    }
   */

    public function home()
    {
        return view('home.index');
    }
}
