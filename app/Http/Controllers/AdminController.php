<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
    	$category = Category::get();
    	$products = Product::get();
    	return view('admin.index')->with([
            'products' =>  $products,
            'categories' =>  $category,
        ]);
    }
}
