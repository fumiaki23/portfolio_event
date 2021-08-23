<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="main">
            <a href='a' class="place">{{ $post->place }}</a>
            <a href='b' class= "applicants">{{ $post->applicants }}</a>            
            <div class="main__post">
                <p>{{ $post->body }}</p>    
            </div>
            <a href='c' class="name">{{ $post->name }}</a>
            <div class="content">
                <p class="content__post">{{ $post->content }}</p>
            </div>
        </div>
        <div class="footer">
            <p><button type="submit">参加する</button></p>
            <a href="/">戻る</a>
        </div>
    </body>
</html>