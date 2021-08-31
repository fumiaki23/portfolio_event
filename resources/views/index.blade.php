<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <h1>Event</h1>
        
        <p class="profile"><a href='/home' >{{ Auth::user()->name }}</a></p>
        <form method="post" action="URL" method="get">
	        <div>
		        <input type="search" name="s" placeholder="キーワードを入力">
	        </div>
	        <input type="submit" value="検索する" />
        </form>
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2><a href='/posts/{{ $post->id }}'>{{ $post->title }}</a></h2>
                    <p class="place">{{ $post->place }}</p>
                    <a href='404' class= "applicants">{{ $post->applicants }}</a>
                    <p class="body">{{ $post->body }}</p>
                    <a href='/profile/{{ $post->name }}' class="name">{{ $post->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $posts->links() }}
        </div>
    </body>
</html>