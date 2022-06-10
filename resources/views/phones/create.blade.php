@extends('layouts.app')

@section('content')
    <h1>Create New Phone</h1>
    <hr>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
