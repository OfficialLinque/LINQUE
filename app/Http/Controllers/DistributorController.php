<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item;
use Auth;
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

            $temp= DB::table('products')
            ->leftJoin('producttypes', 'producttypes.prodid', '=', 'products.prodtype')
            ->select('products.*','products.prodname AS iname','products.prodid AS item',   'producttypes.prodtype AS type')
            ->get();
        return view('dproduct')->with(compact('temp'));
    }
    public function addproduct(Request $request)
    {
            $a = $request->dynamicValue;


            $item = new item;
            $item->sellerid =   Auth::user()->id;
            $item->prodname = $request->pname;
            $item->prodtotalquantity = $request->pquantity;
            $item->prodtype = $request->ptype;
            $item->proddesc = $request->pdesc;
            $item->remember_token = null;
            $item->prodimg = 'test';
            $item->save();

          //  $temp = DB::select('select MAX(id) as "temp" FROM items');
        //    $package = new package;
        //    for($i=1;$i<=$a;$i++)
        //    {
        //      $package->product_id= $request-> $temp+1;
        //      $package->description = $request->inpack.i;
        //      $package->price = $request->inprice.i;
        //      $package->save();
          //  }

    }
    public function editproduct(Request $request)
    {

      $id = $request->input('id');
      $item = item::find($id);
      $output = array(
      //'id' =>$item->id,
      'prodname' => $item->prodname,
      'prodtotalquantity' =>  $item->prodtotalquantity,
      'prodtype' => $item->prodtype,
      'prodimg' => $item->prodimg,
      'proddesc' =>$item->proddesc,
      );
      echo json_encode($output);

    }

    public function editproduct1(Request $request)
    {

            $a = $request->dynamicValue;
            //$item = new item;
            $id = $request->input('id');
            $item = item::find($id);
            $item->prodname = $request->epname;
            $item->prodtotalquantity = $request->epquantity;
            $item->prodtype = $request->eptype;
            $item->proddesc = $request->epdesc;
            $item->remember_token = null;
            $item->prodimg = 'test';
            $item->save();

      /*      $temp = DB::select('select MAX(id) as "temp" FROM items');
            $package = new package;
            for($i=1;$i<=$a;$i++)
            {
              $package->product_id= $request-> $temp+1;
              $package->description = $request->inpack.i;
              $package->price = $request->inprice.i;
              $package->save();
            }*/

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
