
@extends('layouts.head')

@section('content')
<div class="jumbotron p-0 text-center" style="background-color: #f0fff6">
    <div class="container mt-5 pt-4 pb-3">
        <h1 class="text-center" style="color: #00a550"> <b>Контакты</b></h1>
    </div>
    <div class="container">
        <div class="cont-block row">
            <div class="cont-cards col cards card p-0">
                <h2 class="card-header alert-success">Сотрудничество</h2>
                <h5 class="card-title mt-3">TexnoZombi25@yandex.ru</h5>
            </div>
            <div class="cont-cards col cards card p-0">
                <h2 class="card-header alert-success">Номера телефонов</h2>
                <h5 class="card-title mt-3">+7(937)376-42-31</h5>
                <h5 class="card-title mt-3">+7(849)376-24-16</h5>
                <h5 class="card-title mt-3">+7(801)537-26-47</h5>
            </div>
            <div class="cont-cards col cards card p-0">
                <h2 class="card-header alert-success">Основная почта</h2>
                <h5 class="card-title mt-3">Texno25@yandex.ru</h5>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
    Страница контактов
@endsection
