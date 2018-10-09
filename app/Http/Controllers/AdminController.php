<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\CreateProductRequest;
use Auth;


class AdminController extends Controller
{
    //

    public function index(){

        if(Auth::check() && (Auth::User()->role ==1)){

                // return all Product
            $products = Product::paginate(5);

            // return all category
            $categories = Product::select('category')->get();

            return view('admin.product.home',compact('products','categories'));

        }
    	

    }

    // crud for product
    public function getCreateProduct(){

    	return view('admin.product.createProduct');

    }

    public function postCreateProduct(CreateProductRequest $req){

    	Product::create($req->all());

    	return redirect()->back()->with(['message'=>"Create Product Successfully"]);

    }

    public function getDetailProduct($id){

    	$detailProduct = Product::find($id);

    	return view('admin.product.detailProduct',compact('detailProduct'));

    }


    public function getUpdateProduct($id){
    	$product = Product::find($id);
    	
    	return view('admin.product.updateProduct',compact('product'));

    }

    public function postUpdateProduct(CreateProductRequest $req,$id){
    	$product = Product::find($id);

    	$product->update($req->all()); 

    	return redirect()->back()->with(['message'=>"Update Successfully"]);

    }

    public function deleteProduct($id){
    	$product = Product::find($id);

    	$product->delete();

    	return redirect()->back()->with(['message'=>"Delete Successfully"]);
    }

  

   
    public function filterProduct(Request $req){
            $query = Product::query();

            if(!empty($req->get('key'))){

                $query = $query->where('name','like',"%$req->key%")->orWhere('description','like',"%$req->key%");

            }

            if(!empty($req->get('category'))){

                 $query = $query->where('category','like',"%$req->category%");
            }


            if(!empty($req->get('price'))){

                 $query = $query->where('price','<',$req->price);
            }

            $products = $query->paginate(5);

            $categories = Product::select('category')->get();

     
            return view('admin.product.home',compact('products','categories'));

     //        if( !empty($req->get('category')) && !empty($req->get('price')) ){

     //             $products = Product::where( [ ['category','like',"%$req->category%"], ['price','<',$req->price] ] )->paginate(5);
     //        }

     //        else if( !empty($req->get('category')) ){

     //             $products = Product::where('category','like',"%$req->category%")->paginate(5);
     //        }

     //        else if( !empty($req->get('price')) ){

     //            $products = Product::where('price','<',$req->price)->paginate(5);
     //        }
     //        else{

     //        }
      
      
    	// // return all category
    
    }

    /*public function seachProduct(Request $req){

       
        $products = Product::where('name','like',"%$req->key%")->orWhere('description','like',"%$req->key%")->paginate(5);

       // return all category
        $categories = Product::select('category')->get();
       
        return view('admin.product.home',compact('products','categories'));
    }*/

    // crud for user

    public function getAllUser(){

    	$users = User::paginate(5);
    	
    	return view('admin.user.home',compact('users'));

    }

    public function getCreateUser(){
    	
    	return view('admin.user.createUser');

    }

    public function postCreateUser(CreateUserRequest $req){

    	User::create($req->all());

    	return redirect()->back()->with(['message'=>"Create User Successfully"]);


    }

    public function getDetailUser($id){
    	$user = User::find($id);
    	
    	return view('admin.user.detailUser',compact('user'));

    }

    public function getUpdateUser($id){
    	$user = User::find($id);
    	
    	return view('admin.user.updateUser',compact('user'));

    }


    public function postUpdateUser(CreateUserRequest $req,$id){

    	$user = User::find($id);
    	
    	$user->update($req->all());

    	return redirect()->back()->with(['message'=>"Update User Successfully"]);

    }


    public function deleteUser($id){
    	
    	$user = User::find($id);
    	
    	$user->delete();

    	return redirect()->back()->with(['message'=>"Delete User Successfully"]);

    }

    public function seachUser(Request $req){

    	$users = User::where('name','like',"%$req->key%")->orWhere('email','like',"%$req->key%")->paginate(5);

       
    	return view('admin.user.home',compact('users'));
    }

   
}

