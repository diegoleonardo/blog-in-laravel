<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script>

        var connection = new WebSocket('ws://localhost:4000/socket/websocket');
        
        // When the connection is open, send some data to the server
        connection.onopen = function () {
           
            connection.send('{"topic":"room:tracking","ref":"1","payload":{},"event":"phx_join"}');
            
            if(localStorage.tracking){
                connection.send(`{"topic":"room:tracking","ref":"","payload":{"id":${localStorage.tracking},"url": "${window.location.href}", "accessDate": "${new Date().toJSON()}"},"event":"tracking_suspect"}`);
            }else{
                connection.send(`{"topic":"room:tracking","ref":"","payload":{"url": "${window.location.href}", "accessDate": "${new Date().toJSON()}"},"event":"tracking_suspect"}`);
            }
        };

        // Log errors
        connection.onerror = function (error) {
            console.log('WebSocket Error ' + error);
        };

        // Log messages from the server
        connection.onmessage = function (e) {
            json = JSON.parse(e.data)
            
            if(json.payload.response.id){
                if(!localStorage.tracking){
                    localStorage.setItem("tracking", `${json.payload.response.id}`);
                }
            }
        };

    </script>
</body>
</html>
