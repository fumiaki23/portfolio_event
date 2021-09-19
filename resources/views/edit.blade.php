<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <title>Event</title>
    </head>
    <body class="bg-lightBlue">
        <div class="col-8 offset-2 my-4 bg-light">
            <div class="container">
                <h1><a href="/">Event</a></h1>  
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="border rounded my-2">
                            <div class="row">
                                <div class="col-3 offset-1">
                                    <img class="img-fluid img-thumbnail" width="200" height="200" src="//2.bp.blogspot.com/-63vQtYUKJBY/UgSMCmG66LI/AAAAAAAAW6w/-VMth7DVjcY/s400/food_hamburger.png">
                                </div>
                                <div class="h2 col-7">
                                    <textarea class="width-100" name="post[title]" placeholder="タイトル" required>{{ $post->title }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 offset-1 font-weight-bold">
                                    <span>募集人数:</span>
                                    <input type="number" name="post[applicants]" placeholder=0 min=1 max=100 value="{{ $post->applicants }}" required/>
                                </div>
                                <div class="col-7 font-weight-bold">
                                    <div class="name">
                                        <input class="user-applicants width-100"type="text" name="post[name]" value="{{ $user->name }}" readonly />
                                    </div>
                                </div>
                                <div class="col-11 offset-1">
                                    <span class="font-weight-bold">開催日時:</span>
                                    <input name="post[date]" type="date" id="today" style="width: 50%;">
                                </div>                                
                                <div class="col-11 offset-1 my-2">
                                    <div class="place">
                                        <span class="font-weight-bold">開催地:</span>
                                        <select name="post[place]" required>
                                            <option value="{{ $post->place }}" selected>{{ $post->place }}</option>
                                            <option value="北海道">北海道</option>
                                            <option value="青森県">青森県</option>
                                            <option value="岩手県">岩手県</option>
                                            <option value="宮城県">宮城県</option>
                                            <option value="秋田県">秋田県</option>
                                            <option value="山形県">山形県</option>
                                            <option value="福島県">福島県</option>
                                            <option value="茨城県">茨城県</option>
                                            <option value="栃木県">栃木県</option>
                                            <option value="群馬県">群馬県</option>
                                            <option value="埼玉県">埼玉県</option>
                                            <option value="千葉県">千葉県</option>
                                            <option value="東京都">東京都</option>
                                            <option value="神奈川県">神奈川県</option>
                                            <option value="新潟県">新潟県</option>
                                            <option value="富山県">富山県</option>
                                            <option value="石川県">石川県</option>
                                            <option value="福井県">福井県</option>
                                            <option value="山梨県">山梨県</option>
                                            <option value="長野県">長野県</option>
                                            <option value="岐阜県">岐阜県</option>
                                            <option value="静岡県">静岡県</option>
                                            <option value="愛知県">愛知県</option>
                                            <option value="三重県">三重県</option>
                                            <option value="滋賀県">滋賀県</option>
                                            <option value="京都府">京都府</option>
                                            <option value="大阪府">大阪府</option>
                                            <option value="兵庫県">兵庫県</option>
                                            <option value="奈良県">奈良県</option>
                                            <option value="和歌山県">和歌山県</option>
                                            <option value="鳥取県">鳥取県</option>
                                            <option value="島根県">島根県</option>
                                            <option value="岡山県">岡山県</option>
                                            <option value="広島県">広島県</option>
                                            <option value="山口県">山口県</option>
                                            <option value="徳島県">徳島県</option>
                                            <option value="香川県">香川県</option>
                                            <option value="愛媛県">愛媛県</option>
                                            <option value="高知県">高知県</option>
                                            <option value="福岡県">福岡県</option>
                                            <option value="佐賀県">佐賀県</option>
                                            <option value="長崎県">長崎県</option>
                                            <option value="熊本県">熊本県</option>
                                            <option value="大分県">大分県</option>
                                            <option value="宮崎県">宮崎県</option>
                                            <option value="鹿児島県">鹿児島県</option>
                                            <option value="沖縄県">沖縄県</option>
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="col-10 offset-1">
                                    <textarea class="width-100" name="post[body]" placeholder="一覧ページに表示されます。" required>{{ $post->body }}</textarea>
                                </div>
                                <div class="col-6">
                                    <p class="deadline"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <textarea class="width-100 row-5" name="post[content]" placeholder="詳細ページに表示されます。" required>{{ $post->content }}</textarea>
                        </div>
                        <div class="text-right"><input type="submit" value="update"/></div>
                    </form>
                <div class="text-right">[<a href="/posts/history">戻る</a>]</div>
            </div>
        </div>
        <script>
            window.onload = function () {
                var date = new Date()
                var year = date.getFullYear()
                var month = date.getMonth() + 1
                var day = date.getDate()
                var maximum = date.getFullYear() + 1
              
                var toTwoDigits = function (num, digit) {
                  num += ''
                  if (num.length < digit) {
                    num = '0' + num
                  }
                  return num
                }
                
                var yyyy = toTwoDigits(year, 4)
                var mm = toTwoDigits(month, 2)
                var dd = toTwoDigits(day, 2)
                var maxi = toTwoDigits(maximum, 4)
                var ymd = yyyy + "-" + mm + "-" + dd;
                var mmd = maxi + "-" + mm + "-" + dd;
                
                document.getElementById("today").value = ymd;
                document.getElementById("today").min = ymd;
                document.getElementById("today").max = mmd;
            }
        </script>
    </body>
</html>