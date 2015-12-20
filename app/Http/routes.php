<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
//Try of routes
Route::get('prueba', function() {
   return "Hola desde Routes.php";
});

//How use a route with parameter
Route::get('pruebaParametros/{nombre}', function($nombre) {
    return "Mi nombre es :".$nombre;
});

//How use a route with parameter optative
Route::get('edad/{edad?}', function($edad = 26) {
    return "Mi edad es: ". $edad;
});

//How use a controller
Route::get('controlador', 'PruebaController@index');

//How use a controller with parameter
Route::get('controladorNombre/{nombre}', 'PruebaController@name');

//How use a controller restful
Route::resource('veterinariaRestful', 'VeterinariaController');

Route::get('/', function () {
    return view('welcome');
});
*/

/*
 try with views
Route::get('/', 'FrontController@index');
Route::get('contacto', 'FrontController@contacto');
Route::get('reviews', 'FrontController@reviews');
*/

Route::resource('/', 'FrontController');
//Route::get('contact', 'FrontController@contact');
Route::resource('client', 'ClientController');
Route::resource('usuario', 'UserController');
//Route::resource('sidebar', 'PruebaController');
Route::resource('login', 'LogController');
Route::get('logout', 'LogController@logout');
Route::resource('home', 'FrontController@home');
Route::resource('administrator', 'AdministratorController');
Route::resource('productType', 'ProductTypeController');
Route::resource('provider', 'ProviderController');
Route::resource('product', 'ProductController');
