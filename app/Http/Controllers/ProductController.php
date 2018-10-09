<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Response;
use App\Http\Requests\CreateProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        $response = Response::json($products,200);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req )
    {

        if((!$req->name)||(!$req->description)){

            $response = Response::json([
             'error' => [
            'message' => 'Please enter all required fields'
             ]
            ], 422);
             return $response;
        }

       Product::create($req->all());

        $response = Response::json([

           'message' => 'The post has been created succesfully',
           'data' => $post,
        ], 201);


       return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(!$product){

            $response = Response::json(['error'=>'This product cannot be found'],404);
             return $response;
        }

        $response = Response::json($product,200);
        return $response;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
