<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Veterinaria\AlertType;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Product;

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
        if(isset(Auth::user()->id)){
            return Redirect::to('/home');
        }

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
        $alerts = AlertType::all();
        /*$products = DB::select('
          SELECT *
          FROM products AS p1
          WHERE quantity <= (
            SELECT stock_alert
            FROM products AS p2
            WHERE p2.id = p1.id
          )'
        );*/

        $products = DB::table('products as p1')
                    ->whereRaw('p1.quantity <=
                        (select stock_alert
                        from products AS p2
                        where p2.id = p1.id)')
                    ->get();
        $productNumber = count($products);
        return view('home.index',compact('alerts','products','productNumber'));
    }
}
