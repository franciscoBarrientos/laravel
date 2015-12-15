<?php
/**
 * Created by PhpStorm.
 * User: Francisco
 * Date: 02-12-15
 * Time: 02:37 AM
 */

namespace Veterinaria\Http\Controllers;


class PruebaController extends Controller {

    public function index () {
        //return "Hola desde Controller";
        return view('sidebar');
    }

    public function name ($nombre) {
        return "Hola mi nombre es: ". $nombre;
    }

} 