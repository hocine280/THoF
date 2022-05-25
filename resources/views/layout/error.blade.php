@extends('layout/app')

@section('fichierCSS')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endsection

@section('content')
    @include('partials/header-error')

    <section id="sectionError" class="mt-5 d-flex justify-content-center">
        <div class="text-center">
            <div>
                @yield('img')
            </div>
            <div class=" fs-1 text-center">
                <p>@yield('code') - @yield('message')</p>
            </div>
            <div>
                @yield('info')
            </div>
        </div>
    </section>
@endsection