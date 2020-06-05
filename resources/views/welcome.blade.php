@extends('layouts.app')

@section('body_content')
    <div id="app" class="home-container">

        <div class="home-site_title">
            <a href="{{ route('public.home') }}">
                <logo-component></logo-component>
            </a>

        </div>

    </div>
@endsection

