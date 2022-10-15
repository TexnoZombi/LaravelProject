
@extends('layouts.head')

@section('content')
<div class="jumbotron" style="background-color: #f0fff6">
    <div class="container">
        <h1 class="text-center mt-4 mb-4" style="color: #00a550"> <b>{{ $title_page }}</b></h1>
    </div>
    <div class="cards card mt-4 ml-auto mr-auto text-center">
        <div class="mb-4">
            <h2 class="card-header alert-warning">{{ $data->title }}</h2>
            @if($data->image != null)
                <img class="img-fluid" src="/images/{{ $data->image }}" alt="img">
            @endif
            <p class="card-title">{{ $data->ads }}</p><br>
            <p class="tel">Для связи: {{ $data->tel }}</p><br>
            @if(Auth::id() == $data->id_user_autors or $role =='admin')
                <a href="{{ Route('adsEdit', $id = $data->id) }}" class="btn alert-warning">Изменить</a>
                <a href="{{ Route('adsDelete', $id = $data->id) }}" class="btn alert-danger">Удалить</a>
            @endif

            @if($data->published != '1')
                @if($role =='admin')
                    <a href="{{ Route('adsСheck', $id = $data->id) }}" class="btn alert-info">Опубликовать</a>
                @endif
            @endif
        </div>
        <p class="data">Опубликовано: {{ $data->created_at }}</p>
    </div>
</div>
@endsection

@section('title')
    Просмотр объявления
@endsection
