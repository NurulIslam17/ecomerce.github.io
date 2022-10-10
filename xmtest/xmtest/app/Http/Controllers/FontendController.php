<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function index()
    {
        return view('font.home.home',[
            'products' => Product::where('status',1)->latest()->get()
        ]);
    }
    public  function productDetails($id)
    {
        return view('font.product.details',[
            'details' => Product::find($id),
            'recent' => Product::where('status',1)->latest()->take(4)->get()]);
    }
}
