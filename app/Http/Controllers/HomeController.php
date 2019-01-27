<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();

        $data = [
            'products' => $products,
        ];
        return view('home', $data);
    }

    public function store(){
        $product = new Product(); //INSERT
        $product->product_name = request()->product_name;
        $product->category_id = request()->category_id;
        $product->save();
        return redirect('/');
    }

    public function create(){
        $categories = Category::all();

        $data = [
            'categories' => $categories,
        ];
        return view('create', $data);
    }

    public function edit($product_id){
        $categories = Category::all();
        $product = Product::find($product_id);

        $data = [
            'categories' => $categories,
            'product' => $product
        ];
        return view('edit', $data);
    }

    public function update(){
        $product = Product::find(request()->product_id);
        $product->product_name = request()->product_name;
        $product->category_id = request()->category_id;
        $product->save();
        return redirect('/');
    }

    public function login(){
        return view('login');
    }
}
