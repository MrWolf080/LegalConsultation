<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <title>Лента заявок</title>
</head>
<body>
<div class="container">
    <h1>Привет, {{$name}}</h1>
    <h4><p>Заявки: </p></h4>
    <div id="any_errors" class="text-danger">
        @error('any_errors')
        {{$message}}
        @enderror
    </div>
    <form action="{{route('filter_applications')}}" method="post">
        @csrf
        <label for="status-filter">Фильтровать:</label>
        <select name="status-filter">
            <option value="all">Все</option>
            <option value="new"@if($data)
                                @if($data['status-filter']=='new')
                                    selected
                                @endif
                               @endif>Новые</option>
            <option value="in work"@if($data)
                                    @if($data['status-filter']=='in work')
                                        selected
                                    @endif
                                   @endif>В работе</option>
            <option value="closed"@if($data)
                                    @if($data['status-filter']=='closed')
                                        selected
                                    @endif
                                   @endif>Закрытые</option>
        </select>
        <select name="category-filter">
            <option value="all">Все</option>
            <option value="land-disputes" @if($data)
                                            @if($data['category-filter']=='land-disputes')
                                             selected
                                            @endif
                                           @endif>Земельные споры</option>
            <option value="family-disputes"@if($data)
                                            @if($data['category-filter']=='family-disputes')
                                                selected
                                            @endif
                                            @endif>Семейные споры</option>
            <option value="labor-disputes"@if($data)
                                            @if($data['category-filter']=='labor-disputes')
                                                selected
                                            @endif
                                            @endif>Трудовые споры</option>
            <option value="police-disputes"@if($data)
                                            @if($data['category-filter']=='police-disputes')
                                                selected
                                            @endif
                @endif>Споры с ГИБДД</option>
        </select>
        <input type="date" name="filter-date-first" @if($data)value="{{$data['filter-date-first']}}"@endif>
        <input type="date" name="filter-date-last" @if($data)value="{{$data['filter-date-last']}}"@endif>
        <button type="submit" class="btn btn-secondary">Отфильтровать</button>
    </form>
    @if(!$applications->isEmpty())
        @foreach($applications as $app)
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
    <div class="modal-footer">
        <a href="{{route('index')}}">На главную</a>
        <a href="{{route('logout')}}">Выйти</a>
    </div>
</div>
</body>
</html>
