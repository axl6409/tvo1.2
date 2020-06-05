@extends('layouts.app')

@section('body_content')

    <div class="app" id="app">
    @include('partials._navbar_public')
    @include('partials._navbar_admin')

        <main class="py-4 main-container">
            @yield('content')
        </main>
    </div>

@endsection
