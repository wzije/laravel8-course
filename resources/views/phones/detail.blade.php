@extends('layouts.app')

{{-- Use section directive --}}
@section('breadcrumbs')
    {{-- call parent section --}}
    @parent
    <li class="breadcrumb-item" aria-current="page"><a href="/phones">Phones</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $phone->name }}</a></li>
@endsection

@section('content')
    <div>
        <h2>{{ $phone->name }}</h2>
        <p>Founded: {{ $phone->founded }}</p>
        <p>
            {{ $phone->description }}
        </p>
    </div>
    <hr>
    <h3>Phone Models</h3>
    <div class="d-flex justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        Model
                    </td>
                    <td>
                        Colors
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($phone->kinds as $kind)
                    <tr>
                        <td> {{ $kind->name }}</td>
                        <td>
                            {{-- get color from phone model using hasManyThrought relation --}}
                            {{-- @foreach ($phone->colors as $color)
                                @if ($kind->id == $color->kind_id)
                                    {{ $color->color }}
                                @endif
                            @endforeach --}}

                            {{-- get color from kind model using hasMany relation --}}
                            @foreach ($kind->colors as $color)
                                {{ $color->color }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
