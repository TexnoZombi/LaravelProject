
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

        <h1 class="text-center mt-4 mb-4" style="color: #00a550"> <b>{{ $title_page }}</b></h1>

        <form 
            class="w-75 ml-auto mr-auto" 
            method="POST" 
            action="{{ Route('adsEditSubmit', $id = $data->id) }}" 
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Название объявления:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Напишите тему" name="title" value="{{ $data->title }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Краткое содержание:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Напишите аннотацию" name="annotation" value="{{ $data->annotation }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Объявление:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="ads" placeholder="Напишите объявление">{{ $data->ads }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Номер телефона:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Напишите номер для связи" name="tel" value="{{ $data->tel }}">
            </div>
            <div class="form-group">
                <label for="image">Добавить изображение:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.jpeg,.png">
            </div>
            <input type="submit" value="Сохранить" class="btn alert-success">
            <a href="{{ Route('adsDelete', $id = $data->id) }}" class="btn alert-danger">Удалить</a>
        </form>
    </div>
@endsection

@section('title')
    Изменить объявление
@endsection
