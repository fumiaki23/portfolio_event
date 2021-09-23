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
                <h1><a href='/'>Event</a></h1>
                <?php $datas = $post->users()->get(); ?>
                @foreach($datas as $data)
                <div><a href='/profile/{{ $data->id }}/name'>{{ $data->name }}</a></div>
                @endforeach
            </div>
        </div>
    </body>
</html>