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

                        @if(!empty($tag))
                            <h2>Update a Tag</h2>
                            <form class="ui form" method="POST" action="{{ route('admin.tags.update', $tag->id) }}">
                            {{method_field('PUT')}}
                        @else
                        <h2>Create a Tag</h2>
                        <form class="ui form" method="POST" action="{{ route('admin.tags.store') }}">
                            @endif
                            {{csrf_field()}}
                            @include('partials._errors')
                            @include('partials._success',['flashSuccess'=>'status'])
                            <div class="form-group field fluid {{ $errors->has('name') ? 'error' : '' }}">
                                <label for="tagName">Name</label>
                                <div class="ui input">
                                    <input class="form-control" type="text" name="name" id="tagName" placeholder="Name" value="{{  ($tag->name) ?? old('name') }}" >
                                </div>
                            </div>

                            <button class="ui fluid fluid primary submit button" type="submit" name="submit">
                                @if(!empty($tag))
                                    Update
                                @else
                                    Create
                                @endif
                                tag
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
