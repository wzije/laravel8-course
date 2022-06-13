<!doctype html>
<html lang="en">

@include('layouts.header')

<body>
    @include('layouts.navbar')

    <main class="container">
        {{-- show breadcrumb if url not home --}}
        @unless (request()->is('/'))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- implement section parent --}}
                    @section('breadcrumbs')
                        <li class="breadcrumb-item {{ request()->is('/') ? 'active' : '' }}" aria-current="page"><a
                                href="/">Home</a></li>
                    @show
                </ol>
            </nav>
        @endunless

        @yield('content')
    </main>


    @include('layouts.footer')

</body>

</html>
