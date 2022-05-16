@extends('layouts.layout')

@section('title', 'Register')

@section('content')
<div class="container mb-4">
    <h3><u>{{ __('form.signup') }}</u></h3>
</div>
<div class="container mt-1">
    <form enctype="multipart/form-data" action="/register" method="POST">
        @csrf
        <div class="form-group row">
            <label for="first_name" class="col-sm-2 col-form-label">{{ __('form.firstname') }}</label>
            <div class="form-group col-sm-4">
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" required>
                @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="middle_name" class="col-sm-2 col-form-label">{{ __('form.middlename') }}</label>
            <div class="form-group col-sm-4">
                <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" >
                @error('middle_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-sm-2 col-form-label">{{ __('form.lastname') }}</label>
            <div class="form-group col-sm-4">
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" required>
                @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="email" class="col-sm-2 col-form-label">{{ __('form.email') }}</label>
            <div class="form-group col-sm-4">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <legend class="col-form-label col-sm-2 float-sm-left pt-0">{{ __('form.gender') }}</legend>
            @foreach($genders as $gender)
            <div class="form-group col-sm-2">
                <label><input name="gender_id" type="radio" value="{{ $gender->id }}">{{ $gender->gender_desc }}</label>
            </div>
            @endforeach
            @error('gender')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="role_id" class="col-sm-2 col-form-label">{{ __('form.role') }}</label>
            <div class="form-group col-sm-4">
                <select name="role_id" class="form-select">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role_desc }}</option>
                    @endforeach
                </select>
            </div>
            @error('role_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">{{ __('form.password') }}</label>
            <div class="form-group col-sm-4">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="display_picture_link" class="col-sm-2 col-form-label">{{ __('form.displaypicture') }}</label>
            <div class="form-group col-sm-4">
                <input type="file" name="display_picture_link" class="form-control @error('display_picture_link') is-invalid @enderror" id="display_picture_link" required>
                @error('display_picture_link')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-warning">{{ __('form.submit') }}</button>
        </div>
    </form>
    <div class="text-center mt-2">
        <a href="{{ route('login') }}">{{ __('form.already') }}</a>
    </div>
</div>
@endsection
