<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;

class CartController extends Controller
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
    public function index()
    {
        // $products = Product::where('sellerid', Auth::id())->get();
        
        // return view('dproduct', compact('products'));
    }

    public function cart(Request $request, $option = null) {
        if($option === 'add') {
            $validator = $request->validate([
                'quantity' => 'required',
                'package' => 'required',
                ]
            );

            $data = new Cart();
            $data->buyerid = Auth::id();
            $data->prodpackid = $request->package;
            $data->prodquantity = $request->quantity;
            $cart = $data->save();
            
            if($cart) {
                return true;
            } else return false;
        } else if($option === 'delete') {

        } else if($option === 'update') {

        }
    }
}
