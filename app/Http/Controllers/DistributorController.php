<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item;
use App\producttypes;
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
            ->leftJoin('producttypes', 'producttypes.id', '=', 'products.prodtype')
            ->select('products.*','products.prodname AS iname','products.id AS item',   'producttypes.prodtype AS type')
            ->get();
        return view('dproduct')->with(compact('temp'));
    }
    public function addproduct(Request $request)
    {
            $a = $request->dynamicValue1;

            $item = new item;
            $item->sellerid =   Auth::user()->id;
            $item->prodname = $request->pname;
            $item->prodtotalquantity = $request->pquantity;
            $item->prodtype = $request->ptype;
            $item->proddesc = $request->pdesc;
            $item->remember_token = null;
            $item->prodimg = 'test';
            $item->save();

            $temp= DB::table('products')
            ->select('id')
            ->orderBy('id', 'desc')
            ->first()->id;

           
            if($a>=1){
              for($i=1;$i<=$a;$i++)
              {

                $inpack="inpack".$i;
                $inprice="inprice".$i;


                $package = new package;
                $package->prodid = $temp;
                $package->prodpack = $request->$inpack;
                $package->prodprice = $request->$inprice;
                $package->save();
              }
            }

    }
    public function editproduct(Request $request)
    {

      $id = $request->input('id');
      $id1 = $request->input('id1');
      $item = item::find($id);
      $item1 = producttypes::find($item->prodtype);
      $packagedata = package::where('prodid', $id)->get();

      $packages = DB::table('prodpackprice')->where('prodid', '=', $id)->count('*');

      $output = array(
      'prodname' => $item->prodname,
      'prodtotalquantity' =>  $item->prodtotalquantity,
      'prodtype' =>  $item->prodtype,
      'prodtype1' =>  $item1,
      'prodimg' => $item->prodimg,
      'proddesc' =>$item->proddesc,
      'packages' => $packages,
      'packagedata' => $packagedata,
      );
      echo json_encode($output);

    }

    public function editproduct1(Request $request)
    {
            $id = $request->input('id');
            $a = $request->dynamicValue;
            $packagedata = package::where('prodid', $id)->get();
            
            $id = $request->input('id');
            $item = item::find($id);
            $item->prodname = $request->epname;
            $item->prodtotalquantity = $request->epquantity;
            $item->prodtype = $request->eptype;
            $item->proddesc = $request->epdesc;
            $item->remember_token = null;
            $item->prodimg = 'test';
            $item->save();

           
            if($a>=1){
              for($i=1;$i<=$a;$i++)
              {
                $checker = 0;
                $inpack="inpack".$i;
                $inprice="inprice".$i;
                $hidden="hidden".$i;

                if($request->$hidden!=NULL){
                  $checker = 1;
                }

                if($checker == 0){
                  $package = new package;
                  $package->prodid = $id;
                  $package->prodpack = $request->$inpack;
                  $package->prodprice = $request->$inprice;
                  $package->save();
                }else if($checker == 1){
                  $package = package::find($request->$hidden);
                  $package->prodid = $id;
                  $package->prodpack = $request->$inpack;
                  $package->prodprice = $request->$inprice;
                  $package->save();
                }

              }
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

    public function deletePackage()
    {   
      $id = $_GET['id'];
      $package = package::find($id);
      $package->delete();
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
