<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Filesystem;
use Srmklive\Dropbox\Client\DropboxClient;
use Srmklive\Dropbox\Adapter\DropboxAdapter;
use App\Product;
use App\ProductPackage;
use App\ProductType;
use DB;
use Auth;
use Carbon\Carbon;
use Storage;

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

        //CODE NILA SUAREZ WA KO KABALO ANI MURAG GIEDIT NI ALLEN
        /*$temp= DB::table('products')
        ->leftJoin('producttypes', 'producttypes.id', '=', 'products.prodtype')
        ->select('products.*','products.prodname AS iname','products.id AS item',   'producttypes.prodtype AS type')
        ->get();
        return view('dproduct')->with(compact('temp'));*/
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
                'pimg' => 'required',
                ]
            );

            foreach ($request->packagename as $key => $value) {
                $validator = $request->validate([
                    'packagename.'.$key => 'required',
                    'packageprice.'.$key => 'required|numeric',
                ]);
            }

            $filename = '11eiqaJu8OucM7pVGsL5BNWof0BRx6_Cl/product.'.$request->pimg->extension();
            $mainDisk = Storage::disk('google')->put($filename, file_get_contents($request->file('pimg')->getRealPath()));
            $url = Storage::disk('google')->url($filename);

            $data = new Product();
            $data->sellerid = Auth::id();
            $data->prodimg = ($url)?$url:null;
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
                'pimg' => 'required',
                ]
            );

            foreach ($request->packagename as $key => $value) {
                $validator = $request->validate([
                    'packageid.'.$key => 'required|numeric',
                    'packagename.'.$key => 'required',
                    'packageprice.'.$key => 'required|numeric',
                ]);
            }
            
            $filename = '11eiqaJu8OucM7pVGsL5BNWof0BRx6_Cl/product.'.$request->pimg->extension();
            $mainDisk = Storage::disk('google')->put($filename, file_get_contents($request->file('pimg')->getRealPath()));
            $url = Storage::disk('google')->url($filename);
            
            $data = Product::find($request->epid);
            $data->prodimg = ($url)?$url:null;
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
        $item = Item::find($id);
        $item1 = ProductType::find($item->prodtype);
        $packagedata = Package::where('prodid', $id)->get();

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
            $packagedata = Package::where('prodid', $id)->get();
            
            $id = $request->input('id');
            $item = Item::find($id);
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
                  $package = new Package;
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
      $item = Item::find($request->input('id'));
      $item->delete();
    }
    public function searchproduct()
    {
    }

    public function deletePackage()
    {   
      $id = $_GET['id'];
      $package = Package::find($id);
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
