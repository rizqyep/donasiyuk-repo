<?php

namespace App\Http\Controllers\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Orphanage;
use App\Gallery;
use Alert;
use Storage;
use Str;
use Auth;

class ProfileController extends Controller
{
    public function update(Request $request, Orphanage $orphanage){
        $data = $request->validate(
            ['name' => 'required',
            'activity_media' => 'mimes:jpeg,png,jpg',
            'orphanage_name' => 'required',
            'needs' => 'required',
            'address' => 'required',
            'kids' => 'required']
        );
        if($request->activity_media){
            $activity_media = Storage::disk('public')->put('activity_media',$data['activity_media']);
            $orphanage->activity_media = $activity_media;
        }
        $user = User::find($orphanage->user->id);
        $orphanage->name = $data['orphanage_name'];
        $orphanage->slug = Str::slug($data['orphanage_name']).'-'.Str::random(20);
        $user->name = $data['name'];
        $orphanage->needs = $data['needs'];
        $orphanage->address = $data['address'];
        $orphanage->kids = $data['kids'];
        $user->save();
        $orphanage->save();
        Alert::success('Berhasil!','Profil berhasil di update!');
        return redirect('/orphanage');
    }
    
    public function gallery(Request $request){
        $data = $request->validate(
            [
                'media'=>'required|mimes:jpeg,jpg,png'
            ]
            );
        $orphanage_id = Auth::user()->orphanage->id;
        $media = Storage::disk('public')->put('orphanage_galleries',$data['media']);
        Gallery::create(
            [
                'orphanage_id' => $orphanage_id,
                'media' => $media
            ]
            );
        Alert::success('Berhasil', 'Foto kegiatan berhasil ditambahkan ke galeri Panti!');
        return redirect('/orphanage#gallery-section');
    }
}
