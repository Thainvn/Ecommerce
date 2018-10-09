<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

    	$products = product::paginate(5);

    	return view('user.home',compact('products'));

    }
    
}
