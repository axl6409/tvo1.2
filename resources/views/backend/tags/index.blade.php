@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tags</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Administration et liste des tags</h1>
                        <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">Nouveau Tag</a>

                        <table  class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                            <tr class="text-center">
                                <th class="sortable" data-sort="tag-table-id"> Id <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="tag-table-name">Name <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="tag-table-slug">Slug <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="tag-table-articles-count">Number of articles <i class="sort icon"></i></th>
                                <th class="sortable" data-sort="tag-table-created-at">Created at <i class="sort icon"></i></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="listable text-center">
                            @if(isset($tags) && count($tags))
                                @foreach($tags as $tag)
                                    <tr>
                                        <td class="tag-table-id">{{$tag->id}}</td>
                                        <td class="tag-table-name">{{$tag->name}}</td>
                                        <td class="tag-table-slug">{{$tag->slug}}</td>
                                        <td class="tag-table-articles-count">{{ $tag->posts->count() }}</td>
                                        <td class="tag-table-created-at">{{$tag->created_at->format('d M Y')}}</td>
                                        <td>
                                            <a href="{{ route('admin.tags.edit', $tag->id) }}" id="edit-tag-{{$tag->id}}"  class="mini ui button primary"><i class="edit icon"></i> Edit</a>
                                                <form class="form-inline form-delete-tag" method="POST" action="{{ route('admin.tags.delete', $tag->id) }}">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="ui mini button red" id="delete-tag-{{$tag->id}}" type="submit"><i class="icon remove tag"></i> Delete</button>

                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr id="tag-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
