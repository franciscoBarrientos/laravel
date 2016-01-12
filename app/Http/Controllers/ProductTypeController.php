<?php

namespace Veterinaria\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Veterinaria\Http\Requests;
use Veterinaria\Http\Controllers\Controller;
use Veterinaria\Product;
use Veterinaria\ProductType;

class ProductTypeController extends Controller{
    public function __construct(){
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::paginate(10);
        return view('productType.index', compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductType::Create([
            'description' => $request['description']
        ]);

        Session::flash('message', 'Tipo de producto creado correctamente');
        return Redirect::to('/productType');
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
        $productType = ProductType::find($id);

        return view('productType.edit', ['productType'=>$productType]);
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
        $productTypes = ProductType::find($id);
        $productTypes -> fill($request->all());
        $productTypes -> save();

        Session::flash('message', 'Tipo de producto editado correctamente');
        return Redirect::to('/productType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);

        $products = DB::table('products')
                    ->select('id')
                    ->where('product_type_id', '=', $productType->id)
                    ->get();

        foreach($products as $product){
            Product::destroy($product->id);
        }

        ProductType::destroy($id);
        Session::flash('message','Tipo de producto Eliminado Correctamente');
        return Redirect::to('/productType');
    }
}
