@extends('layouts.app')

{{-- Use section directive --}}
@section('breadcrumbs')
    {{-- call parent section --}}
    @parent
    <li class="breadcrumb-item" aria-current="page"><a href="/phones">Phones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</a></li>
@endsection

@section('content')
    <h3>Create New Phone</h3>
    <hr>
    {{-- error messages --}}
    @include('layouts.error')

    <form action="/phones" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="founded" class="form-label">Founded</label>
            <input type="number" class="form-control" id="founded" name="founded">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
