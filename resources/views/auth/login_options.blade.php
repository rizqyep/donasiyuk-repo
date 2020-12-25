@extends('layouts.app')

@section('title')
Pilihan Daftar Akun
@endsection


@push('styles')
@endpush

@section('content')
<div class="container">
    <h1 class="text-center font-weight-bold mt-3">Masuk ke akun kamu hari ini!</h1>
    <div class="row pt-5">
        <div class="col-md-6 mb-5 text-center">
            <div class="card w-75 mx-auto">
                <div class="card-body">
                    <h4 class="font-weight-bold">Donatur</h4>
                    <p class="mt-3 text-muted">Yuk berbagi kebaikan hari ini!</p>
                    <a href="{{url('/login/user')}}" class="btn btn-primary text-white">Masuk sebagai Donatur</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-5 text-center">
            <div class="card w-75 mx-auto">
                <div class="card-body">
                    <h4 class="font-weight-bold">Panti Asuhan</h4>
                    <p class="mt-3 text-muted">Pantau data panti asuhan mu</p>
                    <a href="{{url('/login/orphanage')}}" class="btn btn-success text-white">Masuk sebagai Panti
                        Asuhan</a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
