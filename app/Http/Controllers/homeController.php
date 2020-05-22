<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class homeController extends Controller
{
    public function index()
    {
       $products = DB::select('SELECT * FROM products Where prod_discount != ?',['0']);
       return view('index',['products' => $products]);
    }
}
