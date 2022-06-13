@extends('layouts.app')

@section('content')
    <h1>Phones</h1>
    <hr>
    <div class="row mb-3">
        <div class="col-6">
            <form action="/phones" method="GET">
                <input type="text" class="form-input" id="input-search" placeholder="Search">
                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-sm btn-secondary" href="/phones/create">Add New Phone</a>
        </div>
    </div>
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
                    <th scope="row">{{ $index + 1 }}</th>
                    <td><a href="/phones/{{ $phone->id }}"></a> {{ $phone->name }}</td>
                    <td>{{ $phone->founded }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="/phones/{{ $phone->id }}/edit" class="btn btn-outline-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="destroy({{ $phone->id }})" class="btn btn-outline-danger">
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
    <div class="d-flex justify-content-center">
        {!! $phones->links() !!}
    </div>
@endsection

@push('css')
    {{-- datatable --}}
    {{-- moment js --}}
    {{-- jquery --}}
    {{-- jquery --}}
@endpush

@push('js')
    <script>
        function destroy(id) {
            if (confirm('Are you sure?')) {
                $('#form-delete-' + id).submit();
            }
        }
    </script>
@endpush
