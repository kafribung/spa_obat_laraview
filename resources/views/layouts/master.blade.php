<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('before-css')
        @include('includes._css')
    @stack('after-css')

    <title> @yield('title') </title>

  </head>

  <body>
    {{-- @include('layouts._navbar') --}}

    @yield('content')

  </body>

    @stack('before-script')
        @include('includes._script')
    @stack('after-script')

</html>
