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
//Front
Route::resource('/', 'FrontController');

//User
Route::resource('user', 'UserController');

//Login
Route::resource('login', 'LogController');
Route::get('logout', 'LogController@logout');

//home
Route::resource('home', 'FrontController@home');

//administrator
Route::resource('administrator', 'AdministratorController');

//pet
Route::resource('pet','PetController');
Route::get('pet/{id}/create', [
    'uses'  => 'PetController@createPetByClient',
    'as'    => 'pet.createpet'
]);
Route::get('pet/{id}/index', [
    'uses'  => 'PetController@indexPetsByClient',
    'as'    => 'pet.indexPetsByClient'
]);

//Client
Route::resource('client', 'ClientController');

//productType
Route::resource('productType', 'ProductTypeController');

//product
Route::resource('product', 'ProductController');
Route::post('product/searchName', [
    'uses'  => 'ProductController@searchByName',
    'as'    => 'product.searchName'
]);
Route::post('product/searchId', [
    'uses'  => 'ProductController@searchById',
    'as'    => 'product.searchId'
]);
Route::post('product/{product}/add', [
    'uses'  => 'ProductController@add',
    'as'    => 'product.add'
]);

//provider
Route::resource('provider', 'ProviderController');

//password recovery
Route::post('password/email','Auth\PasswordController@postEmail');
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

//ticket
Route::resource('ticket', 'TicketController');
Route::get('ticket/{id}/pdf', [
    'uses'  => 'TicketController@pdf',
    'as'    => 'ticket.pdf'
]);
Route::post('ticket/{id}',[
    'uses'  =>  'TicketController@paid',
    'as'    =>  'ticket.paid'
]);
Route::get('ticket/canceled/list',[
    'uses'  =>  'TicketController@canceled',
    'as'    =>  'ticket.canceled'
]);

//atention
Route::resource('atention', 'AtentionController');
Route::get('atention/{petId}/add', [
    'uses'  => 'AtentionController@add',
    'as'    => 'atention.add'
]);
Route::get('atention/{petId}/index', [
    'uses'  => 'AtentionController@indexByPetId',
    'as'    => 'atention.indexByPetId'
]);
Route::get('atention/{id}/detail', [
    'uses'  => 'AtentionController@detail',
    'as'    => 'atention.detail'
]);
Route::get('atention/{id}/pdf', [
    'uses'  => 'AtentionController@pdf',
    'as'    => 'atention.pdf'
]);

//atentionType
Route::resource('atentionType', 'AtentionTypeController');

//species
Route::resource('species', 'SpeciesController');
Route::get('species/{id}/destroy', [
    'uses'  => 'SpeciesController@destroy',
    'as'    => 'species.destroy'
]);

//breed
Route::resource('breed', 'BreedController');
Route::get('breed/{id}/destroy', [
    'uses'  => 'BreedController@destroy',
    'as'    => 'breed.destroy'
]);
Route::get('breeds/{id}','SpeciesController@getBreeds');

//AlertType
Route::resource('alertType', 'AlertTypeController');
