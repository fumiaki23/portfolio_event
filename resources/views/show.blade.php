<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    
    <body class="bg-lightBlue">
        <div class="col-8 offset-2 my-4 bg-white">
            <div class="container">
                <h1><a href="/">Event</a></h1>
                <p class="profile"><a href='/home' >ホームボタン</a></p>
            </div>
            <div class="container">
                <div class="border rounded my-2 bg-light">
                    <div class="row">
                        <div class="col-3 offset-1 my-2">
                            <img class="img-fluid img-thumbnail" width="200" height="200" src="//2.bp.blogspot.com/-63vQtYUKJBY/UgSMCmG66LI/AAAAAAAAW6w/-VMth7DVjcY/s400/food_hamburger.png">
                        </div>
                        <div class="h2 col-7">
                            <p class="title mt-2 width-100" href='/posts/{{ $post->id }}'>{{ $post->title }}</p>
                        </div>
                        <div class="col-3 offset-1 font-weight-bold mb-3">
                            <span>募集人数:</span><a href=''>?/{{ $post->applicants }}</a>
                        </div>
                        <div class="col-6 font-weight-bold">
                            <a href='/profile/{{ $post->id }}/name'>{{ $post->name }}</a>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="date"><span class="font-weight-bold">開催日時:</span>{{ $post->date }}</p>
                        </div>                        
                        <div class="col-10 offset-1">
                            <p class="place"><span class="font-weight-bold">開催地:</span>{{ $post->place }}</p>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="body width-100">{{ $post->body }}</p>
                        </div>
                        <div class="col-10 offset-1">
                            <div class="countDown">掲載終了まであと
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
                        <div class="col-10 offset-1">
                            <p class="content width-100">{{ $post->content }}</p>
                        </div>
                        <div class="d-flex justify-content-start">
                            <div class="col-2 offset-2">
                            @if($post->users()->where('user_id', Auth::id())->exists())
                                <form action="{{ route('unfavorites', $post) }}" method="POST">
                                @csrf
                                    <input type="submit" value="&#xf004; いいね! {{ $post->users()->count() }}" class="fas btn text-danger mt-2 border mb-2">
                                </form>
                            @else
                                <form action="{{ route('favorites', $post) }}" method="POST">
                                @csrf
                                    <input type="submit" value="&#xf004; いいね! {{ $post->users()->count() }}" class="fas btn text-muted border mb-2">
                                </form>
                            </div>
                            @endif
                            </div>
                            <div class="col-2 offset-3 ">
                            @if($post->users()->where('user_id', Auth::id())->exists())
                                <form action="{{ route('unfavorites', $post) }}" method="POST">
                                @csrf
                                    <input type="submit" value="&#xf004; いいね! {{ $post->users()->count() }}" class="fas btn text-danger pl-4 mt-2 border mb-2">
                                </form>
                            @else
                                <form action="{{ route('favorites', $post) }}" method="POST">
                                @csrf
                                    <input type="submit" value="&#xf004; いいね! {{ $post->users()->count() }}" class="fas btn text-muted pl-4 border mb-2">
                                </form>
                            </div>
                            @endif</div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="text-right">[<a href="/">戻る</a>]</div>
            </div>
        </div>
    </body>
</html>