@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catégories</div>

                    <div class="card-body">
                        @if(!empty($category))
                            <h1>Mettre à jour la catégorie</h1>
                            <form method="POST" class="form-admin" action="{{ url('admin/categories/update', $category->id) }}" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                        @else
                            <h1>Créer une nouvelle catégorie</h1>
                            <form method="POST" class="form-admin" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                @endif
                                {{ csrf_field() }}
                                @include('partials._errors')
                                @include('partials._success',['flashSuccess'=>'status'])

                                <div class="form-group">
                                    <label for="categoryName">Name</label>
                                    <input class="form-control" type="text" name="name" id="categoryName" placeholder="Nom de la catégorie" value="{{  ($category->name) ?? old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="categoryDescription">Description</label>
                                    <input class="form-control" type="text" name="description" id="categoryDescription" placeholder="Description de la catégorie" value="{{  ($category->description) ?? old('description') }}">
                                </div>
                                <div class="form-group">
                                    <label for="categoryImage">Image</label>
                                    <input class="form-control-file" type="file" name="image" id="categoryImage">
                                    @if(!empty($category->image))
                                        <div class="ui segment left floated segment-margin">
                                            <div class="ui medium bordered edit-post-image">
                                                <img id="post-image-preview" src="{{ asset('storage/category/' . $category->image)  }}">
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success">Sauvegarder</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
