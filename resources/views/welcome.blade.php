<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">

        <!-- Sass -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!--my stylesheet-->
        <link href="{{ asset('css/retouch.css') }}" rel="stylesheet">

    </head>
    <body>

    <h2 class="title_page">{{ $title }}</h2>

        <div id="app">

            <comments></comments>
            {{--:datacomments="{{ $comments }}"--}}

        </div>

<!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
