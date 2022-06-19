@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    You are logged in!
                    <h3>Profile</h3>
                    <p class="name">{{ $user->name }}</p>

                <p class="recuruit"><a href="">募集中のイベント</a></p>
                    <!--<p class="recuruited"><a href="posts/recuruited">過去に募集したイベント</a></p>-->
                    <p class="history"><a href="">参加中のイベント</a></p>
                    <!--<p class="history"><a href="">過去に参加したイベント</a></p>-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection