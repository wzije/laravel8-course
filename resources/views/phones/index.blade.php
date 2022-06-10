@extends('layouts.app')

@section('content')
    <h1>Phone List</h1>
    <hr>
    <a href="/phones/create">Add New Phone</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Founded</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phones as $phone)
                <tr>
                    <th scope="row">{{ $phone->id }}</th>
                    <td><a href="/phones/{{ $phone->id }}"></a> {{ $phone->name }}</td>
                    <td>{{ $phone->founded }}</td>
                    <td>
                        <a href="/phones/{{ $phone->id }}/edit" class="btn btn-link btn-sm"><i
                                class="fa fa-edit"></i></a>
                        <form action="/phones/{{ $phone->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link btn-sm"><i class="fa fa-times"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
