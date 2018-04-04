<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Transaction;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
                return "true";
            } else return false;
        } else if($option === 'delete') {
            $check = array();
            $id = $request->input('id');
            $deleteproduct = Cart::where('id', $id)->first();

            if($deleteproduct){                    
                Cart::find($id)->delete();

                $check = array(
                    'success' => true, 
                    'message' => ' successfully deleted!'
                );
            } else {
                $check = array(
                    'success' => false, 
                    'message' => 'Something went wrong!'
                );
            }    

            echo json_encode($check);
        } else if($option === 'getData') {
             $id = $request->input('id');
             $cart = Cart::where('id', $id)->first();

             $productni = DB::table('prodpackprice')
            ->join('products', 'prodpackprice.prodid', '=', 'products.id')
            ->join('carts', 'prodpackprice.id', '=', 'carts.prodpackid')
            ->select('carts.prodpackid','carts.prodquantity','carts.buyerid', 'products.prodname','products.id','carts.id as cart_id', 'prodpackprice.prodprice')
            ->where('carts.id', '=', $id)
            ->first();

            $package = DB::table('prodpackprice')
            ->join('products', 'prodpackprice.prodid', '=', 'products.id')
            ->select('prodpackprice.prodpack','prodpackprice.prodprice' ,'prodpackprice.id')
            ->where('prodpackprice.prodid', '=', $productni->id)
            ->get();
            
            $data = array();
            $data['product'] = $productni;
            $data['package'] = $package;
            echo json_encode($data);


            
        } else if($option === 'update') {
            $id = $request->input('updateid');           
            $produkto = Cart::where('id',$id)->first();

              if($produkto) {            
                   $produkto->prodpackid = $request->package;
                    $produkto->prodquantity = $request->updatequantity;
                    $cart = $produkto->save();
                    echo json_encode(true); 
        }

            echo json_encode($request->package);
            
        
    }else if($option === 'checkout') {
             $productni = DB::table('prodpackprice')
            ->join('products', 'prodpackprice.prodid', '=', 'products.id')
            ->join('carts', 'prodpackprice.id', '=', 'carts.prodpackid')
            ->join('users', 'products.sellerid', '=', 'users.id')
            ->select('carts.prodquantity','carts.buyerid', 'products.*', 'prodpackprice.prodprice','prodpackprice.prodpack','users.fname','users.lname')
            // ->where('carts.id', '=', $id)
            ->get();

            
            $randomnumber = mt_rand(100000, 999999);
              foreach ($productni as $key => $value) {
                $data = new Transaction();
                $data->transid = $randomnumber;
                $data->buyerid  = $productni[$key]->buyerid;
                $data->prodid  = $productni[$key]->id;           
                $data->prodpack  = $productni[$key]->prodpack; 
                $data->prodprice = $productni[$key]->prodprice;             
                $data->prodquantity = $productni[$key]->prodquantity;
                $data->sellerid = $productni[$key]->sellerid; 
               $cart = $data->save(); 
                $products = Product::where('id',$productni[$key]->id)->first();
                 $products->prodtotalquantity = ($products->prodtotalquantity-$productni[$key]->prodquantity);
                 $updatedquantity = $products->save();


                 if($cart) {
              Cart::truncate();

            } else return false;             
            }
             
           echo json_encode($productni);
        
    }
}
}
