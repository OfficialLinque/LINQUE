<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductPackage;
use App\ProductType;
use DB;
use Auth;
use Carbon\Carbon;

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
        $products = Product::where('sellerid', Auth::id())->orderBy('created_at', 'desc')->get();
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
            $validator = $request->validate([
                'pname' => 'required',
                'pquantity' => 'required|numeric',
                'pdesc' => 'required',
                'ptype' => 'required|numeric',
                'packagename' => 'required',
                'packageprice' => 'required',
                ]
            );

            foreach ($request->packagename as $key => $value) {
                $validator = $request->validate([
                    'packagename.'.$key => 'required',
                    'packageprice.'.$key => 'required|numeric',
                ]);
            }

            $data = new Product();
            $data->sellerid = Auth::id();
            $data->prodimg = 'testimg';
            $data->prodname = $request->pname;
            $data->proddesc = $request->pdesc;
            $data->prodtype = $request->ptype;
            $data->prodtotalquantity = $request->pquantity;
            $productInsert = $data->save();

            $prodid = $data->id;

            if($productInsert) {
                $package = array();

                foreach ($request->packagename as $key => $value) {                    
                    $data = new ProductPackage();
                    $data->prodid = $prodid;
                    $data->prodprice = $request->packageprice[$key];
                    $data->prodpack = $request->packagename[$key];
                    $prodpackageInsert = $data->save();
                }

                echo json_encode($prodpackageInsert);
            } else echo json_encode(false);
        } else if($option === 'edit') {
            $validator = $request->validate([
                'epid' => 'required|numeric',
                'epname' => 'required',
                'epquantity' => 'required|numeric',
                'epdesc' => 'required',
                'ptype' => 'required|numeric',
                'packageid' => 'required',
                'packagename' => 'required',
                'packageprice' => 'required',
                ]
            );

            foreach ($request->packagename as $key => $value) {
                $validator = $request->validate([
                    'packageid.'.$key => 'required|numeric',
                    'packagename.'.$key => 'required',
                    'packageprice.'.$key => 'required|numeric',
                ]);
            }
            
            $data = Product::find($request->epid);
            $data->prodimg = 'testimg';
            $data->prodname = $request->epname;
            $data->proddesc = $request->epdesc;
            $data->prodtype = $request->ptype;
            $data->prodtotalquantity = $request->epquantity;
            $productUpdate = $data->save();

            if($productUpdate) {
                $package = array();

                foreach ($request->packagename as $key => $value) {
                    $data = ProductPackage::find($request->packageid[$key]);
                    $data->prodprice = $request->packageprice[$key];
                    $data->prodpack = $request->packagename[$key];
                    $prodpackageUpdate = $data->save();
                }

                echo json_encode($prodpackageUpdate);
            } else echo json_encode(false);
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
