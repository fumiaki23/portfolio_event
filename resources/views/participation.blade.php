<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    
    <body class="bg-lightBlue">
        <div class="col-8 offset-2 my-4 bg-white">
            <div class="container">
                <h1>Event</h1>
                <p class="profile"><a href='/home' >ホームボタン</a></p>
                <form method="post" action="URL" method="get">
        	        <div>
        		        <input type="search" name="s" placeholder="キーワードを入力">
        	        </div>
        	        <input type="submit" value="検索する" />
                </form>
            </div>
            <div class="container pb-2">
                @foreach ($posts as $post)
                @if($post->users()->where('user_id', Auth::id())->exists())
                <div class="border rounded my-2 bg-light">
                    <div class="row">
                        <div class="col-3 offset-1 my-2">
                            <img class="img-fluid img-thumbnail" width="200" height="200" src="//2.bp.blogspot.com/-63vQtYUKJBY/UgSMCmG66LI/AAAAAAAAW6w/-VMth7DVjcY/s400/food_hamburger.png">
                        </div>
                        <div class="h2 col-6 mt-2">
                            <a class="title width-100" href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 offset-1 font-weight-bold mb-3">
                            <span>募集人数:</span><a href='/posts/{{ $post->id }}/applicants'>{{ $post->users()->count() }}/{{ $post->applicants }}</a>
                        </div>
                        <div class="col-6 font-weight-bold">
                            <span class="font-weight-bold">投稿者:</span><a class="name width-100" href='/profile/{{ $post->user_id }}/name'>{{ $post->name }}</a>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="date"><span class="font-weight-bold" style="width: 50%;">開催日時:</span>{{ $post->date }}</p>
                        </div>                        
                        <div class="col-10 offset-1">
                            <p class="place"><span class="font-weight-bold">開催地:</span>{{ $post->place }}</p>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="body width-100">{{ $post->body }}</p>
                        </div>
                        <div class="col-6 offset-1">
                            <div class="countDown mb-2">掲載終了まであと
                                <span class="countDownText font-weight-bold text-success" style="font-size: 24px;">
                                    <script>
                                        var now = new Date();
                                        var point = new Date("{{ $post->date }}");
                                        var countdown = Math.ceil((point.getTime() - now.getTime()) / (1000 * 60 * 60 * 24));
                                        if (countdown >= 0) {
                                            document.write(countdown);
                                        }
                                    </script>
                                </span>日
                            </div>
                        </div>
                        @auth
                            @if( ( $post->user_id ) !== ( Auth::user()->id ) )
                                @if($post->users()->where('user_id', Auth::id())->exists())
                                <div class="col-4 text-right">
                                    <form action="{{ route('unfavorites', $post) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="&#xf004; いいね! {{ $post->users()->count() }}" class="fas btn text-danger mt-2 border mb-2">
                                    </form>
                                </div>
                                @else
                                <div class="col-4 text-right">
                                    <form action="{{ route('favorites', $post) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="&#xf004; いいね! {{ $post->users()->count() }}" class="fas btn text-muted my-2 border">
                                    </form>
                                </div>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="paginate">{{ $posts->links() }}</div>
        </div>
    </body>
</html>