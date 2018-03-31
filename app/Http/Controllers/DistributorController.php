<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dproduct');
    }
    public function addproduct()
    {   
        
       
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
