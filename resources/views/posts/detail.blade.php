@extends('layouts.app')

{{-- Use section directive --}}
@section('breadcrumbs')
    {{-- call parent section --}}
    @parent
    <li class="breadcrumb-item" aria-current="page"><a href="/posts">posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</a></li>
@endsection

@section('content')
    <div>
        <h2>{{ $post->title }}</h2>
        <p class="text-muted">
            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
        </p>
        <p>
            {{ $post->body }}
        </p>
    </div>
@endsection
