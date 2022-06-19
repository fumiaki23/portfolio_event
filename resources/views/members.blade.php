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
                    <div class="hamburger-menu">
        <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn"><span></span></label>
        <!--ここからメニュー-->
        <div class="menu-content">
            <ul>
                <li>
                    <a href="/home">profile</a>
                </li>                
                <li>
                    <a href="/create">企画を投稿する</a>
                </li>
                <li>
                    <a href="/recuruit">あなたの投稿</a>
                </li>
                <li>
                    <a href="/participation">参加中のイベント</a>
                </li>

            </ul>
        </div>
        <!--ここまでメニュー-->
    </body>
</html>