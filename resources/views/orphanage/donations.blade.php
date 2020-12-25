@extends('layouts.orphanage')

@section('title')
@endsection


@push('styles')
@endpush

@section('content')
<div class="container pt-3 pb-3">
    <h3 class="font-weight-bold text-center mb-4">
        Daftar Donasi Masuk</h3>

    <table class="table text-center">
        <thead class="primary-bg-color text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Donatur</th>
                <th scope="col">Nominal Donasi</th>
                <th scope="col">Bukti Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach(Auth::user()->orphanage->donations as $donation )
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    <p>{{$donation->user->name}}</p>
                </td>
                <td>
                    <p>Rp. {{$donation->amount}}</p>
                </td>
                <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#proofModal{{$loop->iteration}}">
                        Lihat Bukti
                    </button></td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="proofModal{{$loop->iteration}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bukti Transaksi
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body overflow-auto">
                            <div class="overflow-auto">
                                <img src="{{asset($donation->photo())}}" alt="Proof Image" loading="lazy"
                                    style="width :90%;object-fit:cover;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
