@extends('layouts.layout')

@section('title', 'Account Maintenance')

@section('content')
<div class="container">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th class="col-md-6 text-center">{{ __('list.account') }}</th>
                <th class="col-md-6 text-center">{{ __('list.action') }}</th>
            </tr>
        </thead>
    </table>
    <table class="table table-bordered">
        <tbody>
            @forelse ($accounts as $account)
            <tr>
                <td>{{ $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name . ' - ' . $account->role->role_desc }}</td>
                <td class="col-md-6">
                    <a class="btn btn-link" href="{{ route('viewupdaterole', $account->id) }}" role="button">{{ __('form.updaterole') }}</a>
                    <form action="{{ route('deleteaccount', $account->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link">{{ __('form.delete') }}</button>
                    </form>
                </td>
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