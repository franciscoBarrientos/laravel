<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Http\Requests\ProviderRequest;
use Veterinaria\Product;
use Veterinaria\Provider;
use Veterinaria\Http\Controllers\UtilsController;

class ProviderController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $providers = Provider::Search($request->name)->paginate(10);
        return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Veterinaria\Http\Requests\ProviderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        if(UtilsController::validateRut($request['rut'],$request['verifying_digit'])){
            Provider::Create([
                'fancy_name'       => $request['fancy_name']
                ,'business_name'    => $request['business_name']
                ,'activity'         => $request['activity']
                ,'rut'              => $request['rut']
                ,'verifying_digit'  => $request['verifying_digit']
                ,'name'             => $request['name']
                ,'email'            => $request['email']
                ,'phone'            => $request['phone']
            ]);

            Session::flash('message', 'Proveedor creado correctamente');
            return Redirect::to('/provider');
        }else{
            Session::flash('message-error', 'El RUT no es correcto');
            return view('provider.create', compact('provider'));
        }
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
        $provider = Provider::find($id);
        return view('provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Veterinaria\Http\Requests\ProviderRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, $id)
    {
        $provider = Provider::find($id);
        $provider -> fill($request->all());

        if(UtilsController::validateRut($provider -> rut,$provider->verifying_digit)){
            $provider -> save();
            Session::flash('message', 'Proveedor editado correctamente');
            return Redirect::to('/provider');
        }else{
            Session::flash('message-error', 'El RUT no es correcto');
            return view('provider.edit', compact('provider'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);

        $products = DB::table('products')
                    ->select('id')
                    ->where('provider_id', '=', $provider->id)
                    ->get();

        foreach($products as $product){
            Product::destroy($product->id);
        }

        Provider::destroy($id);
        Session::flash('message','Proveedor eliminado correctamente');
        return Redirect::to('/provider');
    }
}
