@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @if(!empty($post))
                    <h1 class="edit-post-title">Mettre à jour le guide</h1>
                    <form method="POST" id="form" class="form-admin" action="{{ route('admin.guides.update', $post->id) }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                @else
                    <h1>Créer un nouveau guide</h1>
                    <form method="POST" id="form" class="form-admin" action="{{ route('admin.guides.store') }}" enctype="multipart/form-data">
                @endif
                    {{ csrf_field() }}
                    @include('partials._errors')
                    @include('partials._success',['flashSuccess'=>'status'])

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group field fluid {{ $errors->has('category') ? 'error' : '' }}">
                                        <label for="postCategory">Categorie</label>
                                        <select class="form-control ui dropdown" id="postCategory" name="category" value="{{ old('category')}}">
                                            <option value="">Category</option>
                                            @if(isset($categories))
                                                @foreach($categories as $category)
                                                    @if((!empty($post) && $post->category->id == $category->id) || old('category') == $category->id)
                                                        <option value="{{ $category->id }}" selected>{{$category->name}} </option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{$category->name}} </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group field fluid {{ $errors->has('tags') ? 'error' : '' }}">
                                        <label for="postTags">Tags</label>
                                        {!! Form::select('tags[]', $tags->pluck('name', 'id'), isset($post->tags) ? $post->tags : '', ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'postTags' ]) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field form-group">
                                        <label for="postImage">New Guide Image</label>
                                        <input type="file" class="form-control" name="image" id="postImage" value="{{ old('image') }}">

                                        @if(!empty($post->image))
                                            <div class="ui segment left floated segment-margin">
                                                <div class="ui medium bordered edit-post-image">
                                                    <img id="post-image-preview" src="{{ asset('storage/post/' . $post->image)  }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group field fluid {{ $errors->has('title') ? 'error' : '' }}">
                                        <label for="article-title">Titre</label>
                                        <div class="ui input">
                                            <input class="form-control" type="text" name="title" id="article-title" placeholder="Titre du guide" value="{{  ($post->title) ?? old('title') }}" >
                                        </div>
                                    </div>

                                    <div class="field {{ $errors->has('content') ? 'error' : '' }}">
                                        <label for="articleContent">Content</label>
                                        <textarea name="content" id="" cols="30" rows="10">
                                            {{ ($post->content) ?? old('content')  }}
                                        </textarea>
                                        <editor-component></editor-component>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="field">
                                        <label for="is_published">Is published</label>
                                        <div class="ui left floated compact segment segment-margin">
                                            <div class="ui fitted toggle checkbox">
                                                @if(isset($post->is_published))
                                                    <input type="checkbox" name="is_published" value="true" {{ (isset($article) && $article->is_published === true || old('is_published')) ? 'checked' : '' }}>
                                                @endif
                                                <input type="checkbox" name="is_published">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field fluid {{ $errors->has('published_at') ? 'error' : '' }}">
                                        <label for="postPublishDate">Published at</label>
                                        <div class="ui input">
                                            <input type="date" name="published_at" class="form-control" id="postPublishDate" placeholder="YYYY-MM-DD H:i:s" value="{{ ($post->published_at) ?? old('published_at') }}">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </div>
                            </div>
                        </div>


                </form>
            </div>

        </div>
    </div>
@endsection
