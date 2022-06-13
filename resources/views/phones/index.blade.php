@extends('layouts.app')

@section('title', 'Phones')

{{-- Use section directive --}}
@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item {{ request()->is('phones') ? 'active' : '' }}" aria-current="page">Phones</a></li>
@endsection

{{-- user yield directive --}}
@section('content')
    <h3>Phones</h3>
    <hr>
    <div class="row mb-3">
        <div class="col-6">
            <form action="/phones" method="GET">
                <input type="text" class="form-input" id="input-search" placeholder="Search" name="key" />
                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-sm btn-secondary" href="/phones/create">Add New Phone</a>
        </div>
    </div>
    {{-- show data --}}
    <table class="table table-hover table-responsive table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col" style="width: 40px">#</th>
                <th scope="col">Name</th>
                <th scope="col">Founded</th>
                <th scope="col" style="width: 20px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phones as $index => $phone)
                <tr>
                    <th scope="row">{{ ($phones->currentPage() - 1) * $phones->perPage() + $index + 1 }}</th>
                    <td onclick="window.location.href='/phones/{{ $phone->id }}'" style="cursor: pointer">
                        {{ $phone->name }}
                    </td>
                    <td>
                        {{ $phone->founded }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="/phones/{{ $phone->id }}/edit" class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="destroy({{ $phone->id }})" class="btn btn-danger btn-xs">
                                <i class="fa fa-times"></i>
                            </button>
                            <form action="/phones/{{ $phone->id }}" method="POST" id="form-delete-{{ $phone->id }}"
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
            Showing {{ $phones->firstItem() }} to {{ $phones->lastItem() }} from {{ $phones->total() }}
        </div>
        <div class="col-6 d-flex justify-content-end">
            {!! $phones->links() !!}
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
