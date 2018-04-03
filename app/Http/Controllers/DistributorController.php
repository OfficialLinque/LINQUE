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
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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

            $pimgfile = Input::file('pimg');
            $pimgname = $request->pname;
            $filename = $pimgname . '.jpg';

            $image_resize = Image::make($pimgfile->getRealPath());
            $image_resize->resize(400,400);

            $destinationPath = '/LinquePics/';

            $image_resize->save(public_path('LinquePics/' .$filename)); 



            $data = new Product();
            $data->sellerid = Auth::id();
            $data->prodimg = $filename;
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
        }else if($option === 'edit') {
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
            
            $data->prodname = $request->epname;
            $data->proddesc = $request->epdesc;
            $data->prodtype = $request->ptype;
            $data->prodtotalquantity = $request->epquantity;

            if(Input::hasFile('epimg')){
                $img = Input::file('epimg');
                $name = Input::get('epname');
                $orgname = $request->file('epimg')->getClientOriginalName();

                $filename = $name . ' - ' . $orgname . '.jpg';
                $image = Image::make($img->getRealPath());
                $image->resize(400,400);
                $oldfilename = $data->prodimg;
                
                Storage::delete($oldfilename);

                $image->save(public_path('LinquePics/' .$filename)); 

                
                $data->prodimg = $filename;
                $data->prodname = $request->epname;
            }
            elseif(!($request->hasFile('epimg'))){
                $editname = Input::get('epname');
                 if($data->prodname != $editname){

                    $imgname = Input::get('epname');
                    $orgname = $request->epid;

                    $oldfilename = $data->prodimg;

                    $filename = $orgname . ' - ' . $imgname . '.jpg';

                    Storage::move($oldfilename, $filename);

                    $data->prodimg = $filename;
                    $data->prodname = $request->epname;
                    
                 }
            }
            
           

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

    public function deleteproduct(Request $request){

            $id = $request->id;
            
            $items = Product::find($id);

            $oldfilename = $items->prodimg;

            Storage::delete($oldfilename);

            $items->delete();
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
