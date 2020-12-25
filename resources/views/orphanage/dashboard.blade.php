@extends('layouts.orphanage')


@section('title')
Dashboard
@endsection

@push('styles')
@endpush


@section('content')
<div class="container pt-3 pb-5">
    <h3 class="font-weight-bold mb-5">Selamat Datang,{{Auth::user()->orphanage->name}} !</h3>

    <div class="card shadow">
        <div class="card-body">
            <h4 class="font-weight-bold mb-3">
                Kelola Data Panti
            </h4>

            <div class="row mb-5">
                <div class="col-md-4">
                    <img src="{{asset('/storage/'.$orphanage->activity_media)}}" alt="Activity Media">
                </div>
                <div class="col-md-8 mt-3 mt-md-0">
                    <form action="{{url('/orphanage/'.$orphanage->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="orphanage_name">Nama Panti Asuhan</label>
                            <input class="form-control" type="text" name="orphanage_name" id="orphanage_name"
                                value="{{ $orphanage->name }}">
                            @error('orphanage_name')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Penanggungjawab</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{$orphanage->user->name}}">
                            @error('name')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kids">Jumlah Anak Asuh</label>
                            <input class="form-control" type="number" name="kids" id="kids"
                                value="{{$orphanage->kids}}">
                            @error('kids')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat Panti</label>
                            <textarea class="form-control" name=" address" id="address" cols="30"
                                rows="5">{{$orphanage->address ?? ''}}</textarea>
                            @error('address')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="needs">Deskripsi Kebutuhan Panti</label>
                            <textarea class="form-control" name=" needs" id="needs" cols="30"
                                rows="5">{{$orphanage->needs ?? ''}}</textarea>
                            @error('needs')
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
@endpush
