<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function get(Request $request){
        $trans = Transaction::where('transid', $request->trans_id)->orderBy('transid')->with('product', 'seller')->get();
        echo json_encode($trans);
    }
}
