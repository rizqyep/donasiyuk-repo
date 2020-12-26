@extends('layouts.app')

@section('title')
Semua Panti
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('/css/orphanage_data/index.css')}}">
@endpush


@section('content')
<div class="container pt-5 pb-5">
    <div class="row">
        @foreach($orphanages as $orphanage)

        <div class="col-6 col-md-4 mb-3">
            <a href="{{url('/orphanages/'.$orphanage->slug)}}">
                <div class="card">
                    <div class="image-holder rounded">
                        <img src="{{asset($orphanage->photo())}}" alt="" class="card-image w-100 rounded-top">
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold">{{$orphanage->name}}</h6>
                        <p class="text-muted"><i class="fas fa-user mr-1 font-weight-bold"></i> <span
                                class="font-weight-bold">{{$orphanage->kids}}</span>
                            anak
                        </p>
                        <p class="text-muted">
                            <i class="fas fa-home mr-1 font-weight-bold"></i>
                            {{ $orphanage->address }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    {{ $orphanages->links() }}
</div>
@endsection


@push('scripts')
@endpush
