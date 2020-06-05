@extends('layouts.app')

@section('body_content')
    <div id="app">

        @include('partials._navbar_public')

        @auth()
            @include('partials._navbar_admin')
        @endauth

        <main class="">
            <div class="home-site_title">
                <logo-component></logo-component>
            </div>
            @yield('content')
        </main>
    </div>
@endsection
