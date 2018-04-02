<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductType;
use DB;
use Auth;
class DistributorController extends Controller
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
        $products = Product::where('sellerid', Auth::id())->get();
        $producttypes = ProductType::all();
        
        return view('dproduct', compact('products', 'producttypes'));
    }

    public function get(Request $request) {        
        $validator = $request->validate([
            'id' => 'required|integer',
            ],[
            'id.required' => 'ID is not defined.'
            ]
        );

        $product = Product::where('id', $request->id)->with('type', 'package')->get();

        echo json_encode($product);
    }

    public function product(Request $request, $option = null) {
        if($option === 'add') {

        }
    }

    public function location()
    {
        return view('dlocation');
    }

    public function order()
    {
        return view('dorder');
    }


}
