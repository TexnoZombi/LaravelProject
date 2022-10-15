
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
                <h1 class="text-center mt-4 mb-4" style="color: #00a550"> <b>Написать объявление</b></h1>
            </div>

            <form class="w-75 ml-auto mr-auto" method="POST" action="{{ Route('adsAddSubmit') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Название объявления:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Напишите тему" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Краткое содержание:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Напишите аннотацию" name="annotation">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Объявление:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="ads" placeholder="Напишите объявление"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Номер телефона:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Напишите ваш номер телефона" name="tel">
                </div>
                <div class="form-group">
                    <label for="image">Добавить изображение в форматах jpg, jpeg или png:</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png">
                </div>
                <input type="submit" value="Сохранить" class="btn alert-success">
            </form>
        @endif
    </div>
@endsection

@section('title')
    Написать объявление
@endsection
