<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Ini adalah halaman post</h1>
    {{-- @if (10 < 5)
        <h3>10 lebih kecil dari 5</h3>
    @else
        <h3> 10 lebih besar dari pada 5 </h3>
    @endif --}}

    @unless (10 < 5)
        <h3>BUKAN OYIII</h3>
    @endunless
{{--
    @for ($i = 0; $i < 2; $i++)
        <h3> Looping i ke {{ $i }}</h3>
    @endfor
    <hr> --}}

    {{-- @php $drinks = json_encode(["susu"]) @endphp --}}

    {{-- @if (empty($drinks))
        data tidak ada
    @endif

    @foreach ($drinks as $drink)
        <h3>{{ $drink }}</h3>
    @endforeach --}}




    {{-- @forelse ([] as $drink)
        <h3>{{ $drink }}</h3>
    @empty
        <p>Data tidak ada</p>
    @endforelse --}}

</body>

</html>
