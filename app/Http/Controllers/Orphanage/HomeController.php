<?php

namespace App\Http\Controllers\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Orphanage;
use Auth;

class HomeController extends Controller
{
    

    public function __construct(){
       
        $this->middleware('orphanage');
    }
    public function index(){
     
        $orphanage = Orphanage::find(Auth::user()->orphanage->id);
        return view('orphanage.dashboard', compact('orphanage'));
    }
}
