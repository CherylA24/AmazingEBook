@extends('layouts.layout')

@section('title','Cart')

@section('content')

<div class="container">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th class="cl-md-9 text-center">{{ __('list.title') }}</th>
                <th></th>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered">
        @if($carts)
        @foreach($carts as $cart)
        <tr>
            <td class="col-md-9">{{ $cart->title }}</td>
            <td>
                <form action="{{ route('deletecart', $cart->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link">{{ __('form.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach   
        @else
        <tr>
            <td>{{ __('list.nodata') }}</td>
        </tr>
        @endif  
    </table>
    <div class="nav justify-content-end mt-5">
        <form action="{{ route('rent') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-warning pl-5 pr-5">{{ __('form.submit') }}</button>
        </form>
    </div>
</div>

@endsection