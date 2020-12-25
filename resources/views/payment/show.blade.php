@extends('layouts.app')

@section('title')
Pembayaran
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/payment-page.css')}}">
@endpush


@section('content')
<div class="container pt-5 pb-5">
    <h3 class="text-center text-primary font-weight-bold mb-3">Instruksi Pembayaran</h3>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="row mt-3 mb-3">
                <div class="col-4">
                    <h5 class="font-weight-bold  mb-3">
                        Nominal yang harus di transfer : </h5>
                </div>
                <div class="col-8">
                    <h5 class="font-weight-bold ">
                        Rp.{{ $transaction->amount }}
                    </h5>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-4">
                    <h5 class="font-weight-bold  mb-3">
                        Rekening : </h5>
                </div>
                <div class="col-8">
                    <div>
                        <img src="{{asset($payment->logo)}}" alt="" class="payment-logo">
                    </div>
                    <h5 class="font-weight-bold mt-3 ">
                        {{ $payment->method}} - {{ $orphanage->account_number }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="font-weight-bold">Upload Bukti Pembayaran</h4>
            <p class="small text-muted">Silahkan upload bukti pembayaran anda</p>
            <form action="{{url('/payment')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="orphanage_id" value="{{$orphanage->id}}">
                <input type="hidden" name="amount" value="{{$transaction->amount}}">
                <div class="form-group ">
                    <div class="custom-file">
                        <input type="file" name="proof" class="custom-file-input" id="proof" lang="id">
                        <label class="custom-file-label" for="proof">Pilih File (jpg,png,jpeg)</label>
                    </div>
                    @error('proof')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <button type="submit" class="mx-0 w-100 btn btn-primary">Upload dan Selesaikan
                    Pembayaran</button>
            </form>
        </div>
    </div>

</div>
@endsection
