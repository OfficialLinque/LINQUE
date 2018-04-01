<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class RetailController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function purchase()
    {
        $products = Product::with('type', 'package')->get();

        return view('rpurchase', compact('products'));
    }

    public function cart()
    {   
        return view('rcart');
    }
    public function checkout()
    {

    }
    public function transaction()
    {
        return view('rtransactions');
    }
    public function rlocation()
    {
        return view('rlocation');
    }

}
