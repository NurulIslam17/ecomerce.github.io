<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.dashboard');
    }

    public  function addProduct()
    {
        return view('admin.product.add-product');
    }

    public  function manageProduct()
    {
        return view('admin.product.manage-product',[
            'products' =>Product::latest()->get()
        ]);
    }
}
