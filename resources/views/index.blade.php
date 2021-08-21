<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('sass/app.scss') }}" rel="stylesheet">
    </head>
    <body>
        <h1>Event</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'><a href='f'>{{ $post->title }}</a></h2>
                    <a href='a' class='place'>{{ $post->place }}</a>
                    <a href='b' class= 'applicants'>{{ $post->applicants }}</a>
                    <p class='body'>{{ $post->body }}</p>
                    <a href='c' class='name'>{{ $post->name }}</a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>