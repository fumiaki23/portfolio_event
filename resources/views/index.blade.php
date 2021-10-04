@extends('layouts.app')
    @section('content')
    <body class="bg-lightBlue">
        <div class="col-10 offset-1 my-4 bg-white">
            <div class="container">
                <form method="post" action="URL" method="get">
        	        <div>
        		        <input type="search" name="s" placeholder="キーワードを入力">
        	        </div>
        	        <input type="submit" value="検索する" />
                </form>
            </div>
	        <a href="/home">home</a>
	        
            <div class="container pb-2">
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
                            <span>募集人数:</span><a href='/posts/{{ $post->id }}/applicants'>{{ $post->users()->count() }}/{{ $post->applicants }}</a>
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
                        <like
                        :post-id="{{ json_encode($post->id) }}"
                        :user-id="{{ json_encode($user->id) }}"
                        :default-Count="{{ json_encode($defaultCount) }}"
                        ></like>
                    </div>
                </div>
                @endforeach
                <a href='/posts/participation'>111</a>
            </div>
            <div class="paginate">{{ $posts->links() }}</div>
        </div>
    </body>
    @endsection