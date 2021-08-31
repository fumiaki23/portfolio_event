@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <h3>Profile</h3>
                    <ul>
                        <li>名前:{{ Auth::user()->name }}</li>
                        <li>メールアドレス:{{ Auth::user()->email }}</li>
                        <p class="create"><a href="posts/create">企画を投稿する</a></p>
                        <p class="history"><a href="">募集中のイベント</a></p>
                        <p class="history"><a href="">過去のイベント</a></p>
                        <p class="history"><a href="">参加中のイベント</a></p>
                        <p class="history"><a href="">過去に参加したイベント</a></p>
                        <p class="history"><a href="">下書き</a></p>
                        <p class="history"><a href="">編集・削除</a></p>
                        <p class="history"><a href="">個人情報設定</a></p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection