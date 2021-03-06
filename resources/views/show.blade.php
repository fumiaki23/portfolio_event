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
        <div class="col-10 offset-1 my-4 pb-2 bg-white">
            <div class="container">
                <h1><a href="/">Event</a></h1>
                <p class="profile"><a href='/home' >ホームボタン</a></p>
            </div>
            <div class="container">
                <div class="border rounded my-2 bg-light">
                    <div class="row">
                        <div class="col-4 offset-1 my-2">
                            <img class="img" src={{ $post->image }}>
                        </div>
                        <div class="h2 col-6">
                            <p class="title mt-2 width-100" href='/posts/{{ $post->id }}'>{{ $post->title }}</p>
                        </div>
                        <div class="col-4 offset-1 font-weight-bold mb-3">
                            <span>募集人数:</span><a href='/posts/{{ $post->id }}/applicants'>{{ $post->users()->count() }}/{{ $post->applicants }}</a>
                        </div>
                        <div class="col-6 font-weight-bold">
                            <a href='/profile/{{ $post->user_id }}/name'>{{ $post->name }}</a>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="date"><span class="font-weight-bold">開催日時:</span>{{ $post->date }}</p>
                        </div>                        
                        <div class="col-2 offset-1">
                            <p class="place"><span class="font-weight-bold">開催地:</span>{{ $post->place }}</p>
                        </div>
                        <div class="col-8">
                            <p class="address width-100">{{ $post->address }}</p>
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
                        @auth
                            @if( ( $post->user_id ) !== ( Auth::user()->id ) )
                                @if($post->users()->where('user_id', Auth::id())->exists())
                                <div class="col-2 offset-1">
                                    <form action="{{ route('nonparticipants', $post) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="&#xf004; 参加中 {{ $post->users()->count() }}" class="fas btn text-danger mt-2 border mb-2">
                                    </form>
                                </div>
                                @else
                                <div class="col-2 offset-1">
                                    <form action="{{ route('participants', $post) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="&#xf004; 参加する {{ $post->users()->count() }}" class="fas btn text-muted my-2 border">
                                    </form>
                                </div>
                                @endif
                            @else
                            <div class="col-6 offset-1">
                                [<a class="title width-100" href='/posts/{{ $post->id }}/edit'>編集・削除</a>]
                            </div>
                            @endif
                        @endauth
                    </div>
                </div>
                @foreach($comments as $comment)
                <div><span>{{ $comment->id }}. </span><a href='/profile/{{ $comment->user->id }}/name'>{{ $comment->user->name }}</a></div>
                <p>{{ $comment->text }}</p>
                @endforeach
                <form action="/posts/{{ $post->id }}/comment" method="POST">
                    @csrf
                    <input type="text" class="form-control"　 placeholder="コメント" name="comment[text]"></textarea>
                    <div class="text-right">
                        <input type="submit" class="fas btn border text-success mt-1" value="コメントする"/>
                    </div>
                </form>
                <div class="footer">
                    <div class="text-right">[<a href="/">戻る</a>]</div>
                </div>
            </div>
        </div>
    </body>
</html>