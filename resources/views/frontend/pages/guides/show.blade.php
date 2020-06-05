@extends('layouts.frontend')

@section('content')

    <div class="single-container">
        <div class="single-hero" style="background-image: url('{{ (isset($post->image)) ? asset('storage/post/'. $post->image) : '' }}')">
            <div class="single-overlay"></div>
            <h1 class="single-title">{{ $post->title }}</h1>
            <p>{{ $category->name }}</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="single-content">
                        {!! $post->content !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
