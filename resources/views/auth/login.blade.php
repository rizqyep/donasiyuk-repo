@extends('layouts.app')

@section('title')
Login User/Donatur
@endsection


@section('content')
<div class="container pt-5 pb-5">
    <div class="card">
        <div class="card-body">
            <h4 class="font-weight-bold mb-4">
                Login sebagai User/Donatur
            </h4>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button class="btn btn-primary text-white w-100 mx-0">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection


@push('scripts')
@endpush
