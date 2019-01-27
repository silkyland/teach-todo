<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $products = Product::paginate(5);

        $data = [
            'products' => $products,
        ];

        //dd($data);
        return view('home', $data);
    }

    public function store(){
        $product = new Product(); //INSERT
        $product->name = request()->name;
        $product->user_id = auth()->user()->id;
        $product->category_id = request()->category_id;
        $product->status = 0;
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
        $product = Product::find(request()->id);
        $product->name = request()->name;
        $product->category_id = request()->category_id;
        $product->save();
        return redirect('/');
    }

    public function delete($id){
        // SELECT * FROM products WHERE product_id = '$id';
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
