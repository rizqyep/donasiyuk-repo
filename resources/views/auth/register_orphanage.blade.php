@extends('layouts.app')

@section('title')
Pilihan Daftar Akun
@endsection


@push('styles')
@endpush

@section('content')
<div class="container mb-5 mt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="mt-3 mb-3 font-weight-bold text-dark">Daftarkan Panti Asuhan Kamu ke DonasiYuk!</h3>
            <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="orphanage">
                <div class="form-group">
                    <label for="orphanage_name">Nama Panti Asuhan</label>
                    <input class="form-control" type="text" name="orphanage_name" id="orphanage_name"
                        value="{{old('orphanage_name')}}">
                    @error('orphanage_name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama Penanggungjawab</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                    @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail Penanggungjawab</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
                    @error('email')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group col-md-6 pl-0">
                    <p>Dokumentasi Kegiatan Panti</p>
                    <div class="custom-file">
                        <input type="file" name="activity_media" class=" custom-file-input" id="activity_media"
                            lang="id" value="{{old('activity_media')}}">
                        <label class="custom-file-label" for="activity_media">Pilih File (jpg,png,jpeg)</label>
                    </div>
                    @error('activity_media')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group col-md-6 pl-0">
                    <p>Foto Bangunan Panti</p>
                    <div class="custom-file">
                        <input type="file" name="building_media" class=" custom-file-input" id="building_media"
                            lang="id" value="{{old('buliding_media')}}">
                        <label class="custom-file-label" for="building_media">Pilih File (jpg,png,jpeg)</label>
                    </div>
                    @error('building_media')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group col-md-6 pl-0">
                    <p>Daftar Pengurus Panti Asuhan</p>
                    <div class="custom-file">
                        <input type="file" name="structure_media" class=" custom-file-input" id="structure_media"
                            lang="id" value="{{old('structure_media')}}">
                        <label class="custom-file-label" for="structure_media">Pilih File (pdf)</label>
                    </div>
                    @error('structure_media')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <h4 class="font-weight-bold">Rekening Untuk Penerimaan Donasi</h4>
                <div class="form-group">
                    <label for="payment">Pilihan Metode/Bank</label>
                    <select name="payment_id" id="payment" class="form-control">
                        @foreach($payments as $payment)
                        <option value="{{$payment->id}}">{{$payment->method}}</option>
                        @endforeach
                    </select>
                    @error('payment_id')
                    @enderror
                </div>

                <div class="form-group">
                    <label for="account_number">No.Rekening / Akun</label>
                    <input class="form-control" type="text" name="account_number" id="account_number"
                        value="{{old('account_number')}}">
                    @error('account_number')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <button class="btn btn-primary text-white font-weight-bold w-100 mx-0 shadow-none">Daftarkan Panti
                    Asuhan</button>


            </form>
        </div>
    </div>

</div>
@endsection
