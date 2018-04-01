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

            $temp= DB::table('items')
            ->leftJoin('product', 'product.id', '=', 'items.prod_type')
            ->select('items.*','items.name AS iname','items.id AS item',   'product.name')
            ->get();
          //$temp = item::all();
        return view('dproduct')->with(compact('temp'));
    }
    public function addproduct(Request $request)
    {
      $a = $request->dynamicValue;


      $item = new item;
            $item->name = $request->pname;
            $item->quantity = $request->pquantity;
            $item->prod_type = $request->ptype;
              $item->mintext = $request->pdesc;
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
    public function editproduct(Request $request)
    {

      $id = $request->input('id');
      $item = item::find($id);
      $output = array(
      'id' =>$item->id,
      'name' => $item->name,
      'quantity' =>  $item->quantity,
      'prod_type' => $item->prod_type,
      'img' => $item->img,
      'mintext' =>$item->mintext,
      );
      echo json_encode($output);

    }

    public function editproduct1(Request $request)
    {

            $a = $request->dynamicValue;
            //$item = new item;
            $id = $request->input('id');
            $item = item::find($id);
            $item->name = $request->epname;
            $item->quantity = $request->epquantity;
            $item->prod_type = $request->eptype;
            $item->mintext = $request->epdesc;
            //$item->img = $request->pimg;
             $item->img = 'test1nakaedit';
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
    public function deleteproduct(Request $request)
    {
      $item = item::find($request->input('id'));
        $item->delete();
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
