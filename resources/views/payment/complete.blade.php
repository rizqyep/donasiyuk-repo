@extends('layouts.app')

@section('title')
Payment Complete
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/afterpay.css')}}">
@endpush


@section('content')
<div class="container pt-5 pb-5">

    <div class="d-flex justify-content-center">
        <img src="{{asset('/img/thankyou.svg')}}" alt="Thankyou Illustrate" class="thankyou-illustration">
    </div>
    <div class="text-center">
        <h3 class="font-weight-bold text-center mt-4">Terima Kasih</h3>
        <p class="text-muted text-center">Terima Kasih atas donasi kamu !<br> Donasi akan segera digunakan untuk
            memenuhi kebutuhan
            panti !</p>

        <a href="{{url('/orphanages')}}" class="btn btn-primary">Telusuri Panti Lain</a>
    </div>
</div>

@endsection
