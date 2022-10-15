@extends('layouts.head')

@section('content')
<div class="jumbotron" style="background-color: #f0fff6">
    <div class="container search">
        <h1 class="mt-4 mb-4 text-center" style="color: #00a550"> <b>{{ $title_page }}</b></h1>
        <form class="d-flex" method="get" action="{{ route('adsSearch') }}">
            <input class="form-control mr-sm-2" type="text" placeholder="Поиск" id="s" name="s">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
    @foreach($data as $el)
        <div class="cards card mt-4 ml-auto mr-auto text-center">
            <div class="mb-4">
                <h2 class="card-header alert-warning">{{ $el->title }}</h2>
                @if($el->image != null)
                    <img class="img-fluid" src="/images/{{ $el->image }}" alt="img">
                @endif
                    <h5 class="card-title mt-3">{{ $el->annotation }}...</h5><br>
                    <a href="{{ Route('adsView', $id = $el->id) }}" class="btn alert-success">Посмотреть</a>
                @if(Auth::id() == $el->id_user_autors or $role =='admin')
                    <a href="{{ Route('adsEdit', $id = $el->id) }}" class="btn alert-warning">Изменить</a>
                    <a href="{{ Route('adsDelete', $id = $el->id) }}" class="btn alert-danger">Удалить</a>
                @endif
            </div>
            <p class="data">Опубликовано: {{ $el->created_at }}</p>
        </div>
    @endforeach
</div>
@endsection

@section('title')
    Объявления
@endsection
