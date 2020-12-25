<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\User;
use App\Profile;
use Auth;
use Storage; 

class ProfileController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
 
        return view('profile.index');
    }

    public function update(Request $request){
    
        $data = $request->validate([
            'name'=>'required',
            'phone_number' =>'required',
            'photo', 'mimes:jpeg,png,jpg',
        ]);
        
        $user = Auth::user();
        $user->name = $data['name'];
        $profile = Auth::user()->profile;
        if($request->photo){
            $photo = Storage::disk('public')->put('profile_images', $request->photo);
            $profile->photo = $photo;
        }

       
        $profile->phone_number = $data['phone_number'];
        $profile->save();
        $user->save();
        
        Alert::success('Berhasil!', 'Profil kamu berhasil di update!');
        return redirect('/profile');
    }
}
