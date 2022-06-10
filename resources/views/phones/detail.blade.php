@extends('layouts.app')

@section('content')
    <h1>Phone Detail</h1>
    <hr>
    <div>
        <h2>{{ $phone->name }}</h2>
        <p>Founded: {{ $phone->founded }}</p>
        <p>
            {{ $phone->description }}
        </p>
    </div>
@endsection
