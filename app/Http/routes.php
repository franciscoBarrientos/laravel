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

Route::resource('/', 'FrontController');
Route::resource('client', 'ClientController');
Route::resource('usuario', 'UserController');
Route::resource('pet', 'PetController');
Route::resource('login', 'LogController');
Route::get('logout', 'LogController@logout');
Route::resource('home', 'FrontController@home');
Route::resource('administrator', 'AdministratorController');
Route::get('pet/{id}/createpet', [
    'uses'  => 'PetController@createPetByClient',
    'as'    => 'pet.createpet'
]);
Route::get('pet/{id}/destroy', [
    'uses'  => 'PetController@destroy',
    'as'    => 'pet.destroy'
]);
Route::get('pet/{id}/index', [
    'uses'  => 'PetController@indexPetsByClient',
    'as'    => 'pet.indexPetsByClient'
]);
Route::get('pet/{clientId}/{petId}/edit', [
    'uses'  => 'PetController@editPetByClient',
    'as'    => 'pet.editPetByClient'
]);
Route::get('client/{id}/destroy', [
    'uses'  => 'ClientController@destroy',
    'as'    => 'client.destroy'
]);
Route::resource('productType', 'ProductTypeController');
Route::resource('provider', 'ProviderController');
Route::resource('product', 'ProductController');
Route::post('password/email','Auth\PasswordController@postEmail');
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');
Route::resource('ticket', 'TicketController');
Route::post('product/searchName', [
    'uses'  => 'ProductController@searchByName',
    'as'    => 'product.searchName'
]);
Route::post('product/searchId', [
    'uses'  => 'ProductController@searchById',
    'as'    => 'product.searchId'
]);
Route::get('ticket/{id}/detail', [
    'uses'  => 'TicketController@detail',
    'as'    => 'ticket.detail'
]);
Route::resource('atention', 'AtentionController');
Route::get('findpets', 'AtentionController@findPetsByClient');
Route::resource('species', 'SpeciesController');
Route::get('species/{id}/destroy', [
    'uses'  => 'SpeciesController@destroy',
    'as'    => 'species.destroy'
]);
Route::resource('breed', 'BreedController');
Route::get('breed/{id}/destroy', [
    'uses'  => 'BreedController@destroy',
    'as'    => 'breed.destroy'
]);
Route::post('product/{product}/add', [
    'uses'  => 'ProductController@add',
    'as'    => 'product.add'
]);