<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Cookie;
use DB;

class ordersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items= Cookie::get();
        $products = array();
        foreach($items as $item){
           $item=json_decode($item);
           array_push($products, $item);
        }
       $products = array_filter($products);
        return view('orders',['products'=>$products]);
    }


    public function  addToTable(Request $request){
        $data =$request->except(['_token']);
        $items= Cookie::get();
        $products = array();
        foreach($items as $item){
           $item=json_decode($item);
           array_push($products, $item);
        }
        $products = array_filter($products);
        $product= array();
        $userID=auth()->user()->id;
        foreach($products as $prod){
            $product = (array) $prod;
           
            array_push($product, $userID);
            if (isset($product[0])) {
                $product['cart_id'] = $product[0];
                unset($product[0]);
            }
             DB::table('carts')->insert($product);
        }
        array_push($data, $userID);
        
        if (isset($data[0])) {
            $data['user_id'] = $data[0];
            unset($data[0]);
        }
        DB::table('orders')->insert($data);
        return back()->with('success','Order Has Been Added');
    }

    public function  show(){
        $userID=auth()->user()->id;
        $orders=DB::select('SELECT * FROM orders WHERE user_id =?',[$userID]);
        return view('pages.myorders',['orders'=>$orders]); 
    }

   
    
}
