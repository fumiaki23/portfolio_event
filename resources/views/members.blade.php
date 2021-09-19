<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/jquery.js') }}"></script>    
    </head>
    
    <body class="bg-lightBlue">
        <div class="col-8 offset-2 my-4 bg-white">
            <div class="container">
            </div>
            <div class="container pb-4">
                
                @foreach ($posts->member as $member)
                <p>{{ $member->name }}</p>
                @endforeach
            </div>
        </div>
    </body>
</html>