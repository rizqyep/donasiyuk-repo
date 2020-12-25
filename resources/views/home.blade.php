@extends('layouts.app')

@section('title')
Home
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/landing.css')}}">
@endpush

@section('content')

<div class="top-row mb-5 pt-5 pb-5">
    <div class="container">
        @guest
        <div class="row">
            <div class="col-md-6 mb-5">
                <div class="d-flex justify-content-center">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h1 class="text-center font-weight-bold">
                                <i class="fas fa-hands-helping"></i>
                            </h1>
                            <h4 class="mt-3 font-weight-bold">
                                Donatur
                            </h4>
                            <p class="text-muted">Mulai berdonasi ke berbagai panti asuhan untuk membantu kebutuhan
                                mereka!
                            </p>
                            <a href="{{url('/register/user')}}" class="btn btn-primary font-weight-bold">
                                MULAI SEKARANG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="d-flex justify-content-center">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h1 class="text-center font-weight-bold">
                                <i class="fas fa-hands"></i>
                            </h1>
                            <h4 class="mt-3 font-weight-bold">
                                Galang Donasi
                            </h4>
                            <p class="text-muted">Daftarkan Panti Asuhan anda agar lebih banyak lagi orang baik yang
                                memberikan bantuan donasi!
                            </p>
                            <a href="{{url('/register/orphanage')}}" class="btn btn-primary font-weight-bold">
                                MULAI SEKARANG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @if(Auth::user()->type=='user')
        <h1 class="text-white font-weight-bold text-center mb-3">Selamat datang Donatur!</h1>
        <h4 class="text-white text-center">Mari salurkan donasimu kepada panti yang membutuhkan!</h4>
        <div class="d-flex justify-content-center">
            <a class="btn primary-bg-color text-white font-weight-bold mt-3" href="{{url('/orphanages')}}">Telusuri
                Panti
                Asuhan</a>
        </div>
        @else
        <h1 class="text-white font-weight-bold text-center mb-3">Selamat datang {{Auth::user()->orphanage->name}}</h1>
        <h4 class="text-white text-center">Mari kelola data panti kamu!</h4>
        <div class="d-flex justify-content-center">
            <a class="btn primary-bg-color text-white font-weight-bold mt-3" href="{{url('/orphanage')}}">Kelola
                Panti
                Asuhan</a>
        </div>
        @endif

        @endguest

    </div>
</div>
<div class="container">

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="d-flex justify-content-center">
                <img src="{{asset('/img/pray_image.png')}}" class="pray-illustration" alt="Pray Image">
            </div>
        </div>

        <div class="col-md-8 mt-3">
            <p class="text-muted text-center text-md-right top-quotes">Tetaplah berbagi meskipun kau merasa tak punya
                apa-apa.
                Karena kau bisa
                berbagi
                perhatian, kasih sayang,
                juga cinta.
                Tuluslah ketika berbagi.
            </p>
            <p class="mt-2 text-center text-md-right font-weight-bold text-dark top-quotes-owner">
                - DonasiYuk -
            </p>

        </div>
    </div>



</div>
@endsection
