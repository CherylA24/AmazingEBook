@extends('layouts.layout')

@section('title', 'Home')

@section('content')
<div class="container">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th class="col-sm-6 text-center">{{ __('list.author') }}</th>
                <th class="col-sm-6 text-center">{{ __('list.title') }}</th>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered">
        <tbody>
            @forelse ($ebooks as $ebook)
            <tr>
                <td class="col-sm-6">{{ $ebook->author}}</td>
                <td class="col-sm-6"><a href="{{ route('detail', $ebook->id) }}">{{ $ebook->title }}</a></td>
            </tr>
            @empty
            <tr>
                <td>{{ __('list.nodata') }}</td>
                <td>{{ __('list.nodata') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
