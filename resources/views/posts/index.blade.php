@extends('layouts.app')

@section('title', 'Posts')

{{-- Use section directive --}}
@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item {{ request()->is('posts') ? 'active' : '' }}" aria-current="page">Posts</a></li>
@endsection

{{-- user yield directive --}}
@section('content')
    <h3>Posts</h3>
    <hr>
    <div class="row mb-3">
        <div class="col-6">
            <form action="/posts" method="GET">
                <input type="text" class="form-input" id="input-search" placeholder="Search" name="key" />
                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-sm btn-secondary" href="/posts/create">Add New Post</a>
        </div>
    </div>
    {{-- show data --}}
    <table class="table table-hover table-responsive table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col" style="width: 40px">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col" style="width: 20px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $phone)
                <tr>
                    <th scope="row">{{ ($posts->currentPage() - 1) * $posts->perPage() + $index + 1 }}</th>
                    <td onclick="window.location.href='/posts/{{ $phone->id }}'" style="cursor: pointer">
                        {{ $phone->title }}
                    </td>
                    <td>
                        {{ $phone->body }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="/posts/{{ $phone->id }}/edit" class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="destroy({{ $phone->id }})" class="btn btn-danger btn-xs">
                                <i class="fa fa-times"></i>
                            </button>
                            <form action="/posts/{{ $phone->id }}" method="POST" id="form-delete-{{ $phone->id }}"
                                class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- information & pagination --}}
    <div class="row">
        <div class="col-6">
            Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} from {{ $posts->total() }}
        </div>
        <div class="col-6 d-flex justify-content-end">
            {!! $posts->links() !!}
        </div>
    </div>
@endsection

{{-- additional css for this page only --}}
@push('css')
    <style>
        .btn-group-xs {
            padding-right: 0.15rem;
            padding-left: 0.15rem;
        }

        .btn-xs {
            padding: 0.15rem 0.5rem !important;
            font-size: .65em !important;
            border-radius: 0.15rem !important;
        }
    </style>
@endpush

{{-- additional script for this page only --}}
@push('js')
    <script>
        function destroy(id) {
            if (confirm('Are you sure?')) {
                $('#form-delete-' + id).submit();
            }
        }

        let vars = urlVars();
        if (vars['key'] != undefined) {
            $('#input-search').val(vars['key']);
        }

        $('.pagination').addClass('pagination-sm');
    </script>
@endpush
