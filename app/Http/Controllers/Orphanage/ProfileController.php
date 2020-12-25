<?php

namespace App\Http\Controllers\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Orphanage;
use Alert;

class ProfileController extends Controller
{
    public function update(Request $request, Orphanage $orphanage){
        $data = $request->validate(
            ['name' => 'required',
            'orphanage_name' => 'required',
            'needs' => 'required',
            'address' => 'required',
            'kids' => 'required']
        );
        $user = User::find($orphanage->user->id);
        $orphanage->name = $data['orphanage_name'];
        $user->name = $data['name'];
        $orphanage->needs = $data['needs'];
        $orphanage->address = $data['address'];
        $orphanage->kids = $data['kids'];
        $user->save();
        $orphanage->save();
        Alert::success('Berhasil!','Profil berhasil di update!');
        return redirect('/orphanage');
    }
}
