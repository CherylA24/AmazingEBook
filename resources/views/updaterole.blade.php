@extends('layouts.layout')

@section('title', 'Update Role')

@section('content')
<div class="container mb-4">
    <h3><u>{{ $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name }}</u></h3>
</div>
<div class="container mt-1">
    <form enctype="multipart/form-data" action="{{ route('updaterole',$account->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="role_id" class="col-sm-2 col-form-label">{{ __('form.role') }}</label>
            <div class="form-group col-sm-4">
                <select name="role_id" class="form-select">
                    @foreach($roles as $role)
                    @if($account->role_id == $role->id)
                        <option value="{{ $role->id }}" selected>{{ $role->role_desc }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->role_desc }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="text-center col-sm-6">
            <button type="submit" class="btn btn-warning">{{ __('form.save') }}</button>
        </div>
    </form>
</div>
@endsection