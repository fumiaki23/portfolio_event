<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <title>Event</title>
    </head>
    <body>
        <h1>Event Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div clss="place">
                <h2>都道府県</h2>
                <input type="text" name="post[place]" placeholder="都道府県"/>
            </div>
            <div class="applicants">
                <h2>募集人数</h2>
                <input type="number" name="post[applicants]"/>
            </div>
            <div class="body">
                <h2>概要</h2>
                <textarea name="post[body]" placeholder="一覧ページに表示されます。"></textarea>
            </div>
            <p>{{ $user['name'] }}</p>
            <div class="name">
                <input type="hidden" name="post[name]" value="{{ $user->name }}" />
            </div>
            <div class="content">
                <h2>詳細情報</h2>
                <textarea name="post[content]" placeholeder="詳細画面に表示されます。"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>