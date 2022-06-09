<!doctype html>
<html lang="en">

@include('layouts.header')

<body>


    @include('layouts.navbar')

    <main class="container">
       @yield("content")
    </main>


    @include('layouts.footer')

</body>

</html>
