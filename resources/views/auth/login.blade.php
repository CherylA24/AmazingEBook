@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<div class="container mb-4">
    <h3><u>{{ __('form.login') }}</u></h3>
</div>
<div class="container mt-1">
    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('loginError') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form enctype="multipart/form-data" action="/login" method="POST">
        @csrf
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">{{ __('form.email') }}</label>
            <div class="form-group col-sm-4">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">{{ __('form.password') }}</label>
            <div class="form-group col-sm-4">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center col-sm-6">
            <button type="submit" class="btn btn-warning">{{ __('form.submit') }}</button>
        </div>
    </form>
    <div class="text-center col-sm-6 mt-2">
        <a href="{{ route('register') }}">{{ __('form.nothave') }}</a>
    </div>
</div>
@endsection
