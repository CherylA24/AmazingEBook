@extends('layouts.layout')

@section('title', 'E-Book Detail')

@section('content')
<div class="container mb-4">
    <h3><u>{{ __('form.detail') }}</u></h3>
</div>
<div class="container mt-1">
    <div class="row">
        <div class="col-sm-2"><p>{{ __('list.title') }}:</p></div>
        <div class="col-sm-10"><p>{{ $ebook->title }}</p></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><p>{{ __('list.author') }}:</p></div>
        <div class="col-sm-10"><p>{{ $ebook->author }}</p></div>
    </div>
    <div class="row">
        <div class="col-sm-2"><p>{{ __('list.description') }}:</p></div>
        <div class="col-sm-10"><p>{{ $ebook->description }}</p></div>
    </div>
    <div class="nav justify-content-end mt-5">
        <form action="{{ route('addtocart', $ebook->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning pl-5 pr-5">{{ __('form.rent') }}</button>
        </form>
    </div>
</div>
@endsection