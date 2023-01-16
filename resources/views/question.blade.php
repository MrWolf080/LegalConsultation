<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>Задать вопрос</title>
</head>
<body>
<div class="container">
    <div class="col-8">
        <h1>Задать вопрос</h1>
        <form id="ask_question" action="{{route('asking_question')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category">Категория</label>
                <select class="form-control" id="category" name="category">
                    @foreach($categories as $category)
                         <option>{{$category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Тема</label>
                <div class="text-danger">
                    @error('subject')
                    {{$message}}
                    @enderror
                </div>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="question">Вопрос</label>
                <div class="text-danger">
                    @error('question')
                    {{$message}}
                    @enderror
                </div>
                <textarea class="form-control" id="question" rows="3" name="question"></textarea>
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
            <input type="submit" class="btn btn-primary" value="Задать вопрос">
        </form>
    </div>
    <div class="modal-footer">
        <a href="{{route('index')}}">На главную</a>
        <a href="{{route('logout')}}">Выйти</a>
    </div>
</div>
</body>
</html>
