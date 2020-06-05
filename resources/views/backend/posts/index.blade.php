@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Guides</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Administration et liste des guides</h1>
                        <a class="btn btn-primary" href="{{ route('admin.guides.create') }}">Nouveau Guide</a>
                    </div>
                </div>
                <div class="card">
                    <h2>Guides</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th>Categorie</th>
                                    <th>User</th>
                                    <th>Tags</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($posts) && count($posts))
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{Str::limit($post->title, $limit = 25, $end = '...')}}</td>
                                    <td>{{(isset($post->category->name))}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->tags->count()}}</td>
                                    <td>
                                        @if($post->is_published && $post->published_at !== null &&  $post->published_at < Carbon\Carbon::now())
                                            <span class="ui label green">Published</span>
                                        @else
                                            <span class="ui label grey">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{$post->created_at->format('d M Y')}}</td>
                                    <td>
                                        <a href="{{ route('admin.guides.edit', $post->id) }}" id="edit-article-{{$post->id}}"  class="mini ui button primary"><i class="edit icon"></i> Edit</a>
                                        <form class="form-inline form-delete-article" method="POST" action="{{route('admin.guides.delete', $post->id)}}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="ui mini button red" id="delete-article-{{$post->id}}" type="submit"><i class="icon remove article"></i> Delete</button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
