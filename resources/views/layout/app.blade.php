<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'CollegeFest')}}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
        <link rel="stylesheet" href="{{URL::asset('css/grid-gallery.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>

        <script src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @yield('content')
        </div>
        @include('inc.footer')
    </body>
    <script src="{{asset('js/script.js')}}"></script>

</html>
