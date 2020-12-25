@extends('layouts.orphanage')


@section('title')
Dashboard
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/orphanage/dashboard.css')}}">
@endpush


@section('content')
<div class="container pt-3 pb-5">
    <h3 class="font-weight-bold mb-5">Selamat Datang,{{Auth::user()->orphanage->name}} !</h3>
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="d-flex justify-content-around align-items-center">
                <div class="text-center">
                    <h5 class="font-weight-bold text-info m3">Donasi Terkumpul </h5>
                    <h4 class="font-weight-bold text-success">Rp. {{$totalDonations}}</h4>
                </div>

                <div class="text-center">
                    <h5 class="font-weight-bold text-info mr-3">Total Donatur </h5>
                    <h4 class="font-weight-bold text-danger">{{$totalUser}} Donatur</h4>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{url('/orphanage/donations')}}" class=" btn btn-md btn-primary font-weight-bold mt-3">
                    Lihat Data Donasi</a>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <h4 class="font-weight-bold mb-3">
                Kelola Data Panti
            </h4>

            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset($orphanage->photo())}}" class="activity_image" alt="Activity Media"
                            id="orphanageImage">
                    </div>
                </div>
                <div class="col-md-8 mt-3 mt-md-0">
                    <form action="{{url('/orphanage/'.$orphanage->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group ">
                            <p>Ganti Foto Profil Panti</p>
                            <p class="small text-muted">(Preview akan tampil di bagian foto panti)</p>
                            <div class="custom-file">
                                <input type="file" name="activity_media" class="custom-file-input" id="activity_media"
                                    lang="id">
                                <label class="custom-file-label" for="activity_media">Pilih File
                                    (jpg,png,jpeg)</label>
                            </div>
                            @error('activity_media')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
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
<div class="container mb-5" id="gallery-section">
    <div class="card mt-3">
        <div class="card-body">
            <h4 class="font-weight-bold">Galeri Kegiatan Panti</h4>

            <div class="row mt-5 mb-3">
                @foreach($orphanage->galleries as $gallery)
                <div class="col-md-4 col-6 mb-4">
                    <img src="{{$gallery->photo()}}" class="activity_image" alt="">
                </div>
                @endforeach
            </div>

            <form action="{{url('/orphanage/gallery')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <h5 class="font-weight-bold">Tambah Foto Aktivitas Panti</h5>
                    <p class="small text-muted">(Preview akan tampil di bagian foto panti)</p>
                    <div class="custom-file">
                        <input type="file" name="media" class="custom-file-input" id="media" lang="id">
                        <label class="custom-file-label" for="media">Pilih File (jpg,png,jpeg)</label>
                    </div>


                    @error('media')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    <div class="preview">
                        <img src="" alt="" id="target" class="d-none activity_image">
                    </div>
                </div>
                <button type="submit" class="mx-0 w-100 btn btn-primary ">Upload</button>



            </form>

        </div>

    </div>
</div>
@endsection



@push('scripts')
<script>
//Profile Photo Handler
var photoInput = document.getElementById('activity_media');
var target = document.getElementById("orphanageImage");
var fr = new FileReader();
fr.onload = function(e) {
    target.src = this.result;
};
photoInput.addEventListener('change', function() {
    fr.readAsDataURL(photoInput.files[0]);
})


//Gallery Input Handle
var mediaInput = document.getElementById('media');
var mediaTarget = document.getElementbyId("target");
var readMedia = new FileReader();

readMedia.onload = function(e) {
    mediaTarget.src = this.result;
}

mediaInput.addEventListener('change', function() {
    readMedia.readAsDataURL(mediaInput.files[0]);
    mediaInput.classList.remove('d-none');
})
</script>
@endpush
