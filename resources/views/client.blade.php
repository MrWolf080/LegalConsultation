<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>Обращения</title>
</head>
<body>
<div class="container">
    <h1>Привет, {{$name}}</h1>
    <div id="any_errors" class="text-danger">
        @error('any_errors')
        {{$message}}
        @enderror
    </div>
    @if(!empty($req))
        @foreach($req as $question)
            <div class="col-8">
                <a href="{{route('messages', $question->id)}}">
                    <h5>{{$loop->iteration}}) {{$question->subject }}</h5>
                </a>
                @if($question->image)
                    <p><img src="{{ Storage::url('images/thumbnail/'.$question->image) }}" alt=""></p>
                @endif
            </div>
        @endforeach
    @else
        <p>У вас пока нет заявок</p>
    @endif
    <form action="{{route('ask_question')}}" method="get">
        <button id="ask_question" class="btn btn-primary">Задать вопрос</button>
    </form>
    <a href="{{route('logout')}}">Выйти</a>
</div>
</body>
</html>
