<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
    <br>
    <p>Заявки от случайных клиентов</p>
    @foreach($clients_applications as $app)
        <div class="modal-content">
            <div class="col-8">
                <h5>{{$app->client->name}}:</h5>
            </div>
            <div class="col-8">
                Дата создания: {{date('d-m-y H:i:s', strtotime($app->created_at))}}
            </div><div class="col-8">
                Категория: {{$app->category->category}}
            </div>
            <div class="col-8">
                Тема: {{$app->subject}}
            </div>
            <div class="col-8">
                Вопрос: {{$app->question}}
            </div>
            @if($app->image)
                <div class="col-8">
                    <p><img src="{{ Storage::url('images/thumbnail/'.$app->image) }}" alt=""></p>
                </div>
            @endif
            <div class="col-8">
                Статус: {{$app->status}}
            </div>
            @if($app->comment)
                <div class="col-8">
                    Комментарий: {{$app->comment}}
                </div>
            @endif
        </div>
    @endforeach
    <br>
    <button id="show-my-apps" class="btn btn-primary">Показать мои заявки</button>
    <div id="my_apps" style="display: none">
        @if(!$my_applications->isEmpty())
            @foreach($my_applications as $app)
                <div class="modal-content">
                    <div class="col-8">
                        Дата создания: {{date('d-m-y H:i:s', strtotime($app->created_at))}}
                    </div>
                    <div class="col-8">
                        Тема: {{$app->subject}}
                    </div>
                    <a href="{{route('messages', $app->id)}}">
                        <div class="col-8">
                            Вопрос: {{$app->question}}
                        </div>
                    </a>
                    @if($app->image)
                        <div class="col-8">
                            <p><img src="{{ Storage::url('images/thumbnail/'.$app->image) }}" alt=""></p>
                        </div>
                    @endif
                    <div class="col-8">
                        Статус: {{$app->status}}
                    </div>
                    @if($app->comment)
                        <div class="col-8">
                            Комментарий: {{$app->comment}}
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <p>Заявки не найдены</p>
        @endif
    </div>
    <form action="{{route('ask_question')}}" method="get">
        <button id="ask_question" class="btn btn-primary">Задать вопрос</button>
    </form>
    <div class="modal-footer">
        <a href="{{route('index')}}">На главную</a>
        <a href="{{route('logout')}}">Выйти</a>
    </div>
</div>
</body>
<script>
    $("#show-my-apps").click(function() {
        if ($("#my_apps").is(":visible")) {
            $(this).text("Показать мои заявки");
        } else {
            $(this).text("Скрыть мои заявки");
        }
        $("#my_apps").toggle();
    });
</script>
</html>
