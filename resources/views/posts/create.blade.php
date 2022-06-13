@extends('layouts.app')

{{-- Use section directive --}}
@section('breadcrumbs')
    {{-- call parent section --}}
    @parent
    <li class="breadcrumb-item" aria-current="page"><a href="/posts">Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</a></li>
@endsection

@section('content')
    <h3>Create New Phone</h3>
    <hr>
    {{-- error messages --}}
    @include('layouts.error')

    <form action="/posts" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
