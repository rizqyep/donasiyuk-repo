@extends('layouts.app')

@section('title')
Semua Panti
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/orphanage_data/show.css')}}">
<script>
function setAmount(amount) {
    let valueInput = document.getElementById('amount');
    valueInput.value = amount;
}
</script>
@endpush


@section('content')
<div class="container pt-5 pb-5">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <div class="d-flex-justify-content-center">
                        <img src="{{$orphanage->photo()}}" alt="" class="card-image">
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="font-weight-bold mb-3">{{$orphanage->name}}</h4>
                    <h5 class="font-weight-bold text-muted mb-2"><i class="fas fa-user mr-2"></i> {{$orphanage->kids}}
                        anak
                    </h5>
                    <h5 class="font-weight-bold text-muted"><i class="fas fa-map-marker-alt mr-2"></i>
                        {{$orphanage->address}}
                    </h5>
                    <h5 class="font-weight-bold mt-4">Kebutuhan Panti</h5>
                    <p class="text-muted">{{$orphanage->needs}}</p>

                    <button type="button" class="btn btn-primary mx-0 w-100 mt-md-5" data-toggle="modal"
                        data-target="#donationModal">
                        Berikan Donasi
                    </button>
                </div>
            </div>


            <h4 class="font-weight-bold mb-3 mt-5">Galeri Kegiatan Panti</h4>
            <div class="row">
                @foreach($orphanage->galleries as $gallery)
                <div class="col-6 col-md-4 mb-3 ">
                    <img src="{{asset($gallery->photo())}}" alt="Gallery Images" class="gallery-image shadow rounded">
                </div>
                @endforeach
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Berikan donasi untuk {{$orphanage->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="font-weight-bold mt-3 mb-3">Pilih Nominal</h4>
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-sm btn-success mr-3" onClick="setAmount(20000)">
                            20.000
                        </button>
                        <button class="btn btn-sm btn-success mr-3" onClick="setAmount(50000)">
                            50.000
                        </button>
                        <button class="btn btn-sm btn-success" onClick="setAmount(100000)">
                            100.000
                        </button>
                    </div>
                    <p class="text-muted">atau</p>

                    <form action="{{url('/transaction')}}" method="post">
                        @csrf
                        <input type="hidden" name="orphanage_id" value="{{$orphanage->id}}">
                        <div class="form-group">
                            <label for="amount">Masukkan Nominal</label>
                            <input class="form-control" type="text" name="amount" id="amount">
                        </div>

                        <button class="btn btn-primary w-100 mx-0">Lanjut ke Pembayaran</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

@endpush
