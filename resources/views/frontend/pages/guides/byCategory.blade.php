@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">Tous les guides !</h1>

                @foreach($posts as $post)
                    <div class="category-bloc category-bloc-image" style="background-image: url('{{ (isset($post->image)) ? asset('storage/post/thumbnail/'. $post->image) : '' }}')">
                        <a href="{{ url('guides/'.$category->slug.'/'.$post->slug) }}">
                            <div class="category-bloc-infos">
                                <h2 class="category-infos-name">{{ $post->title }}</h2>
                                <div class="category-infos-desc">{!! $post->getExcerpt($post->content, 0, 50) !!}</div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
