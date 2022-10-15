
@extends('layouts.head')

@section('content')
    <div class="jumbotron" style="background-color: #f0fff6">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
            <h3 class="text-success mt-5 text-center">{{ session('success') }}</h3><br>
        @else
            <div class="container">
                <h1 class="text-center mt-4 mb-4" style="color: #00a550"> <b>Обратная связь</b></h1>
            </div>
                <form class="w-75 ml-auto mr-auto" method="POST" action="{{ Route('helpSubmit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Введите Ваш email:</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="TexnoZombi25@yandex.ru" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Опишите проблему:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="question"></textarea>
                    </div>
                    <input type="submit" value="Отправить" class="btn alert-success">
                </form>
            </div>
        @endif
    </div>
@endsection

@section('title')
    Страница для обращений
@endsection