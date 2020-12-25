<?php

namespace App\Http\Controllers\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DonationController extends Controller
{
    public function index(){
        return view('orphanage.donations');
    }
}
