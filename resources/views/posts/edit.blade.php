@extends('layouts.app')

{{-- Use section directive --}}
@section('breadcrumbs')
    {{-- call parent section --}}
    @parent
    <li class="breadcrumb-item" aria-current="page"><a href="/posts">Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit {{ $post->title }} </a></li>
@endsection

@section('content')
    <h3>Edit Form </h3>
    <hr>
    {{-- show errors --}}
    @include('layouts.error')

    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body">{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
