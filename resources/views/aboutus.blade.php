@extends('layouts.app')

@section('title')
About Us
@endsection


@push('styles')


@push('styles')
<link rel="stylesheet" href="{{asset('/css/landing.css')}}">
@endpush

@section('content')
<div class="container pt-5 pb-5">
    <h4 class="mb-3 font-weight-bold">About Us</h4>
    <div class="row mb-5">
        <div class="col-md-4">
            <p class="text-center text-md-left">
                <img src="{{asset('/img/pray_image.png')}}" class="pray-illustration" alt="Pray Image">
            </p>
        </div>

        <div class="col-md-8 mt-3 mt-md-0">
            <p class="text-muted text-center text-md-right about-us-content">Donasi Yuk merupakan website yang
                menyediakan
                layanan untuk berdonasi maupun menerima donasi khusus untuk Panti Asuhan. Tujuan dari website kami
                adalah untuk memberikan kesempatan bagia pada donatur maupun penerima donasi dalam hal berbagi dengan
                memanfaatkan internet. Semoga dengan adanya Website Donasi Yuk, banyak Panti Asuhan yang dapat terbantu
                dan donatur juga mendapat balasan yang lebih baik.<br> Amin.
            </p>


        </div>
    </div>

</div>
@endsection


@push('scripts')
@endpush
