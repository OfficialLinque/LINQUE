<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Transaction;
use Illuminate\Support\Facades\DB;

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
        $carts = Cart::with('package', 'buyer')->get();

        return view('rcart', compact('carts'));
    }
    public function checkout()
    {

    }
    public function transaction()
    {
        // $trans = Transaction::orderBy('id')->groupBy('transid')->get();

        return view('rtransactions');
    }
    public function rlocation()
    {
        return view('rlocation');
    }

    public function get(Request $request){
        
    }
}
