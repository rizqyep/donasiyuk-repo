<?php

namespace App\Http\Controllers\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Orphanage;
class DataController extends Controller
{
    public function index(){
        $orphanages = Orphanage::paginate(6);
        return view('orphanage_data.index',compact('orphanages'));
    }

    public function show($slug){
        $orphanage = Orphanage::where('slug',$slug)->first();
        return view('orphanage_data.show',compact('orphanage'));
    }
}
