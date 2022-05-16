<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <div class="card">
        <div class="card-header text-center" style="background-color: #afc9e9; padding:60px">
            <h1>Amazing E-Book</h1>
            @if (Auth::check())
            <div class="dropdown mt-2">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                    {{ __('list.language') }}
                </button>
                <div class="dropdown-menu">
                    @foreach($available_locales as $locale_name => $available_locale)
                    <a class="dropdown-item" href="language/{{ $available_locale }}">{{ $locale_name }}</a>
                    @endforeach
                </div>
            </div>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">{{ __('form.logout') }}</button>   
                    </form>
                </li>
            </ul>
            @else
            <div class="dropdown mt-2">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
                    {{ __('list.language') }}
                </button>
                <div class="dropdown-menu">
                    @foreach($available_locales as $locale_name => $available_locale)
                    <a class="dropdown-item" href="language/{{ $available_locale }}">{{ $locale_name }}</a>
                    @endforeach
                </div>
            </div>
            <ul class="nav justify-content-end">
                <li class="nav-item mr-2">
                    <a href="{{ route('register') }}" class="btn btn-warning">{{ __('form.register') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-warning">{{ __('form.login') }}</a>
                </li>
            </ul>
            @endif
        </div>
        <div>
        @auth
            @if (Auth::user()->role_id == 1)
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="collapse navbar-collapse justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('list.home') }}</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('viewcart') }}">{{ __('list.cart') }}</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('profile') }}">{{ __('list.profile') }}</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('accmaintenance') }}">{{ __('list.accmain') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>
            @endif
            @if (Auth::user()->role_id == 2)
            <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                <div class="collapse navbar-collapse justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('list.home') }}</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('viewcart') }}">{{ __('list.cart') }}</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a class="nav-link" href="{{ route('profile') }}">{{ __('list.profile') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>     
            @endif
            @endauth
        </div>
        <div class="card-body">
            @yield('content')
        </div>
        <div class="card-footer text-muted text-center" style="background-color: #afc9e9">
            © Amazing E-book 2022
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>