@extends('layouts.layout')

@section('title','Saved')

@section('content')
<div class="container">
    <div class="text-center">
        <div class="circle">
            <div class="text">
                <h3>{{ __('list.saved') }}</h3>
                <a href="{{ route('home') }}">{{ __('list.returnhome') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection