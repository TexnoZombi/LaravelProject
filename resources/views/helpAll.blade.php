
@extends('layouts.head')

@section('content')
    <div class="jumbotron" style="background-color: #f0fff6">
        <div class="container mt-4 mb-4">
            <h1 class="text-center" style="color: #00a550"> <b>Список вопросов</b></h1>
        </div>
        @foreach($data as $el)
            <div class="cards card w-50 mt-4 ml-auto mr-auto text-center">
                <div class="mb-4">
                    <h2 class="card-header alert-warning">{{ $el->email }}</h2>
                    <h5 class="card-title mt-3"> {{ $el->question }} </h5><br>
                    <a href="mailto:{{ $el->email }}" class="btn alert-success">Ответить</a>
                    <a href="{{ Route('helpDelete', $id = $el->id) }}" class="btn alert-danger">Удалить</a>
                </div>
                <p class="data">Опубликовано: {{ $el->created_at }}</p>
            </div>
        @endforeach
    </div>
@endsection

@section('title')
    Все вопросы
@endsection
