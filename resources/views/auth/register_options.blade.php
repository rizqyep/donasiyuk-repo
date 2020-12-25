@extends('layouts.app')

@section('title')
Pilihan Daftar Akun
@endsection


@push('styles')
@endpush

@section('content')
<div class="container">
    <h1 class="text-center font-weight-bold mt-3">DonasiYuk memiliki 2 tipe akun yang bisa kamu pilih !</h1>
    <div class="row pt-5">
        <div class="col-md-6 mb-5 text-center">
            <div class="card w-75 mx-auto">
                <div class="card-body">
                    <h4 class="font-weight-bold">Donatur</h4>
                    <p class="mt-3 text-muted">Buat kamu yang ingin berbagi kebaikan kepada yang membutuhkan</p>
                    <a href="{{url('/register/user')}}" class="btn btn-primary text-white">Daftar Sebagai
                        Donatur</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5 text-center">
            <div class="card w-75 mx-auto">
                <div class="card-body">
                    <h4 class="font-weight-bold">Panti Asuhan</h4>
                    <p class="mt-3 text-muted">Buat kamu yang ingin mendaftarkan panti kamu untuk mencari orang-orang
                        baik!</p>
                    <a href="{{url('/register/orphanage')}}" class="btn btn-success text-white">Daftarkan Panti
                        Asuhan</a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
