<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class shopController extends Controller
{
    public function index()
    {
       $allproducts = DB::select('SELECT * FROM products');
       return view('pages.shop',['allproducts' => $allproducts]);
    }

    public function vegShow(){
        $allproducts = DB::select('SELECT * FROM products Where prod_category = ?',['vegetables']);
        return view('pages.shop',['allproducts' => $allproducts]);
    }

    public function fruitsShow(){
        $allproducts = DB::select('SELECT * FROM products Where prod_category = ?',['fruits']);
        return view('pages.shop',['allproducts' => $allproducts]);
    }

    public function juiceShow(){
        $allproducts = DB::select('SELECT * FROM products Where prod_category = ?',['juice']);
        return view('pages.shop',['allproducts' => $allproducts]);
    }

    public function productShow($id){
        $product = DB::select('SELECT * FROM products Where prod_id = ?',[$id]);
        return view('pages.product',['product' => $product]);
    }

    public function search(Request $request){
         $data =$request->except(['_token']);
          $search = $data['searchtxt'];
        //   dd($search);
        $allproducts = DB::table('products')->where('prod_name','LIKE','%'.$search.'%')->get();
        return view('pages.shop',['allproducts' => $allproducts]);
    }

}
