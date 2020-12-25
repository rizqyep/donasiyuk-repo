@extends('layouts.app')

@section('title')
Profil Kamu
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/profile.css')}}">
@endpush


@section('content')
<div class="container pt-5 pb-5">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="font-weight-bold mb-3">
                Edit Profil Kamu
            </h4>

            <div class="row mb-5">
                <div class="col-md-4">
                    @if( Auth::user()->profile->photo)
                    <div class="d-flex justify-content-center">
                        <img src="{{asset( Auth::user()->profile->photo() )}}" class="profile_image rounded-circle"
                            alt="Profile Image" id="previewImage">
                    </div>
                    @else
                    <div class="d-flex-justify-content-center">
                        <h1 class="text-center" style="font-size : 180px" id="userIcon">
                            <i class="fas fa-user"></i>
                        </h1>
                        <p class="text-center">
                            <img src="" alt="Profile Preview" class="profile-image d-none rounded-circle"
                                id="previewImage">
                        </p>
                    </div>
                    @endif
                </div>
                <div class="col-md-8 mt-3 mt-md-0">
                    <form action="{{url('/profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group ">
                            <p>Ganti /Tambahkan Foto Profil</p>
                            <p class="small text-muted">Preview akan tampil di bagian foto profil</p>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="photo" lang="id">
                                <label class="custom-file-label" for="photo">Pilih File
                                    (jpg,png,jpeg)</label>
                            </div>
                            @error('photo')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{Auth::user()->name}}">
                            @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kids">No. Telepon</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number"
                                value="{{Auth::user()->profile->phone_number}}">
                            @error('phone_number')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <button class="btn primary-bg-color text-white font-weight-bold w-100 mx-0 shadow-none">Update
                            Profil</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection


@push('scripts')
<script>
//Profile Photo Handler
var photoInput = document.getElementById('photo');
var target = document.getElementById("previewImage");

var userIcon = document.getElementById("userIcon");
var fr = new FileReader();
fr.onload = function(e) {
    target.src = this.result;

};
photoInput.addEventListener('change', function() {
    target.classList.remove('d-none');
    userIcon.classList.add('d-none');
    fr.readAsDataURL(photoInput.files[0]);
})
</script>
@endpush
