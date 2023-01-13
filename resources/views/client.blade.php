<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>Обращения</title>
</head>
<body>
<div class="container">
    Привет, {{$name}}
    <div id="any_errors" class="text-danger">
        @error('any_errors')
        {{$message}}
        @enderror
    </div>
        @foreach($req as $question)
            <div class="col-8">
                <h2>{{ $question->subject }}</h2>
                {{$question->image}}
                <p><img src="{{ Storage::url('images/thumbnail/'.$question->image) }}" alt=""></p>
            </div>
        @endforeach
    <button id="ask_question" class="btn btn-primary">Задать вопрос</button>
    <a href="{{route('logout')}}">Выйти</a>
</div>
<script>
    document.getElementById("ask_question").addEventListener("click", function()
    {
        window.open("{{route('ask_question')}}", "ask_question", "height=500,width=500");
    });
</script>
</body>
</html>
