@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-title">Tous les guides !</h1>

            @foreach($categories as $category)
                <div class="category-bloc category-bloc-image" style="background-image: url('{{ (isset($category->image)) ? asset('storage/category/thumbnail/'. $category->image) : '' }}')">
                    <div class="category-bloc-infos">
                        <a href="{{ route('public.guides.byCategory', $category->slug) }}">
                            <h2 class="category-infos-name">{{ $category->name }}</h2>
                            <p class="category-infos-desc">{{ $category->description }}</p>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
