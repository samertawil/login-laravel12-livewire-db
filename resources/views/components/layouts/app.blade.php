<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">


    @include('partials.metronic7.head')


    @vite(['resources/js/app.js'])

    @livewireStyles


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')
    <style>
        body {
            background-color: rgb(255, 248, 237);
        }


        .filepond--credits {
            display: none !important;
        }
    </style>
</head>

<body>
    {{-- @include('partials.metronic7.top-navbar') --}}





    <div class="my-3 container">
        @isset($crumb)
            {{ $crumb }}
        @endisset
    </div>

    @isset($slot)
        {{ $slot }}
    @endisset

    @include('partials.metronic7.footer-script')

    {{-- @livewireScriptConfig   --}}

    @livewireScripts
    @filepondScripts

    @stack('js')
</body>


</html>
