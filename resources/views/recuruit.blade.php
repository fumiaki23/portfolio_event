<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    
    <body class="bg-lightBlue">
        <div class="col-8 offset-2 my-4 bg-white">
            <div class="container">
                <h1><a href="/">Event</a></h1>
            <div class="container">
                
                @foreach ($posts as $post)
                <div class="border rounded my-2 bg-light">
                    <div class="row">
                        <div class="col-4 offset-1 my-2">
                            <img class="img" src={{ $post->image }}>
                        </div>
                        <div class="h2 col-5 mt-2">
                            <a class="title width-100" href='/posts/{{ $post->id }}'>{{ $post->title }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 offset-1 font-weight-bold mb-3">
                            <span>参加人数:</span><a href='/posts/{{ $post->id }}/applicants'>{{ $post->users()->count() }}/{{ $post->applicants }}</a>
                        </div>
                        <div class="col-5 font-weight-bold">
                            <a class="name width-100" href='/profile/{{ $post->user_id }}/name'>{{ $post->name }}</a>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="date"><span class="font-weight-bold" style="width: 50%;">開催日時:</span>{{ $post->date }}</p>
                        </div>                        
                        <div class="col-3 offset-1">
                            <p class="place"><span class="font-weight-bold">開催地:</span>{{ $post->place }}</p>
                        </div>
                        <div class="col-7">
                            <p class="address width-100">{{ $post->address }}</p>
                        </div>
                        <div class="col-10 offset-1">
                            <p class="body width-100">{{ $post->body }}</p>
                        </div>
                        <div class="col-6 offset-1">
                            <div class="countDown mb-2">掲載終了まであと
                                <span class="countDownText font-weight-bold text-success" style="font-size: 24px;">
                                    <script>
                                        var now = new Date("{{ $today }}");
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
                                <div class="col-2 offset-1">
                                    <form action="{{ route('nonparticipants', $post) }}" method="POST">
                                    @csrf
                                        <input type="button" value="&#xf004; 参加中 {{ $post->users()->count() }}" class="fas btn text-danger mt-2 border mb-2">
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
                @endforeach
                <div class="text-right">[<a href="/home">戻る</a>]</div>
                <div class="paginate">{{ $posts->links() }}</div>
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
    </div>
    </body>
</html>