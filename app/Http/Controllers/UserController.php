<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index($id){
        $products = Product::where('user_id', $id)->orderBy('id', 'desc')->paginate(5);

        $data = [
            'products' => $products,
        ];

        // dd($data);
        return view('home', $data);
    }
}
