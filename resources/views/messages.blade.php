<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>Сообщения</title>
</head>
<body>
<div class="container">
    <h1>Привет, {{$name}}</h1>
    <div id="any_errors" class="text-danger">
        @error('any_errors')
        {{$message}}
        @enderror
    </div>
    <div class="col-8">
        {{$category}}
    </div>
    <div class="col-8">
        {{$application->subject}}
    </div>
    <div class="col-8">
        {{$application->question}}
    </div>
    @if($application->image)
        <div class="col-8">
            <p><img src="{{ Storage::url('images/thumbnail/'.$application->image) }}" alt=""></p>
        </div>
    @endif
    <br>
    @if(!$messages->isEmpty())
        @foreach($messages as $message_)
            <div class="col-8">
                @if($message_->id_user==$client->id)
                    {{$client->name}}:
                @elseif($lawyer!=null)
                    {{$lawyer->name}}:
                @endif
                    {{$message_->message}}
                @if($message_->image)
                    <p><img src="{{ Storage::url('images/thumbnail/'.$message_->image) }}" alt=""></p>
                @endif
            </div>
        @endforeach
    @endif
    <br>
    <div class="col-8">
        <h4>Отправить сообщение: </h4>
        <form method="post" action="{{route('send_message', $application->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="message">Сообщение</label>
                <div class="text-danger">
                    @error('message')
                    {{$message}}
                    @enderror
                </div>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Картинка</label>
                <div class="text-danger">
                    @error('image')
                    {{$message}}
                    @enderror
                </div>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <input type="submit" class="btn btn-primary" value="Отправить сообщение">
        </form>
        @if($role==='Клиент')
            <br><br>
            <form method="post" action="{{route('solve_problem', $application->id)}}">
                @csrf
                <input type="submit" class="btn btn-primary" value="Проблема решена">
            </form>
        @endif
    </div>
    <a href="{{route('logout')}}">Выйти</a>
</div>
</body>
</html>
