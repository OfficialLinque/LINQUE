<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item;
use DB;
use App\package;
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

      $temp = DB::table('items')
              ->join('product', 'product.id', '=', 'items.prod_type')
              ->select('items.*',  'items.name AS iname','product.name')
              ->get();
        return view('dproduct')->with(compact('temp'));
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
