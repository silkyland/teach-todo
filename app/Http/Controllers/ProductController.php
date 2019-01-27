<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function toggle($id)
    {
       $product = \App\Product::find($id);
       //$product->status = $product->status == 0 ? 1 : 0;
       if($product->status == 0){
           $product->status = 1;
       }else{
           $product->status = 0;
       }
       $product->save();
       return $product->status == 0 ? "Incomplete" : "Completed";
    }
}
