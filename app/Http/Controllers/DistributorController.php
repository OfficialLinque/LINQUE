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
        
        return view('dproduct', compact('products'));
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

    public function addproduct(Request $request)
    {
        $a = $request->dynamicValue;

        $item = new item;
        $item->name = $request->pname;
        $item->quantity = $request->pquantity;
        $item->prod_type = $request->ptype;
        //$item->img = $request->pimg;
        $item->img = 'test';
        $item->save();

        $temp = DB::select('select MAX(id) as "temp" FROM items');
        $package = new package;
        for($i=1;$i<=$a;$i++)
        {
            $package->product_id= $request-> $temp+1;
            $package->description = $request->inpack.i;
            $package->price = $request->inprice.i;
            $package->save();
        }
    }
    public function editproduct()
    {
    }
    public function deleteproduct()
    {
    }
    public function searchproduct()
    {
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
