@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Catégories</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Administration et liste des catégories</h1>
                        <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Nouvelle categorie</a>

                        <table  class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                            <tr class="text-center">
                                <th class="sortable" data-sort="category-table-id"> Id <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="category-table-name"> Name <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="category-table-slug"> Slug <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="category-table-articles-count"> Number of articles <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="category-created-at"> Created at</th>
                                <th> Actions</th>
                            </tr>
                            </thead>
                            <tbody class="listable text-center">
                            @if(isset($categories) && count($categories))
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="category-table-id">{{$category->id}}</td>
                                        <td class="category-table-name">{{$category->name}}</td>
                                        <td class="category-table-slug">{{$category->slug}}</td>
                                        <td class="category-table-articles-count">{{$category->posts->count()}}</td>
                                        <td class="category-table-created-at">{{$category->created_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" id="edit-category-{{$category->id}}"  class="mini ui button primary"><i class="edit icon"></i> Edit</a>
                                                <form class="form-inline form-delete-category" method="POST" action="{{ route('admin.categories.delete', $category->id) }}">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="ui mini button red" id="delete-category-{{$category->id}}" type="submit"><i class="icon remove category"></i> Delete</button>

                                                </form>
                                        </td>
                                    </tr>

                                @endforeach

                            @endif
                            <tr id="category-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
