<html>
    <head>
        <title>Admin Area (write here the username)</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/flaticon.css') }}">
        @yield('styles')
        <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalable=0">  
    </head>
    <body>
        @include('includes.admin-header')
        
        <div class="main">
            @yield('content')
        
       
        @include('includes.footer')
    </div>
        <script>
            $baseUrl = {{ URL::to('/') }}
        </script>
        
        @yield('scripts')
    </body>
</html>