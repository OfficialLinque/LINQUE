<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetailController extends Controller
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
    public function purchase()
    {
        return view('rpurchase');
    }
    public function cart()
    {   
        return view('rcart');
    }
    public function checkout()
    {

    }
    public function transaction()
    {
        return view('rtransactions');
    }
    public function rlocation()
    {
        return view('rlocation');
    }

}
