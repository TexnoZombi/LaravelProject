
@extends('layouts.head')

@section('content')

<div class="jumbotron p-0" style="background-color: #f0fff6">
    <div class="-fluid"><img src="{{ asset('images/1.jpeg') }}" width="100%" height="300" alt="Картинка"></div>
        <div class="container">
            <h1 class="mt-4" style="color: #00a550"> <b>Приветствую, уважаемый посетитель!</b></h1><br>
            <h5>Вы попали на сайт CatAd, где можно оставить своё объявление о продаже каких-либо вещей, отыскать работу или найти себе лучшего работника. Если предложение заинтересует человека, то он обязательно свяжется с Вами по номеру телефона.</h5><br>
            <h5>Удачи в делах, пусть Вам улыбнётся удача!</h5><br>
            <h5 class="font-weight-bold text-danger">ВАЖНО: Без регистрации выложить объявление не получится!</h5><br>
            <p><a class="btn alert-success" href="/ads" role="button">Перейти к объявлениям &raquo;</a></p>
        </div>
    </div>
</main>
@endsection

@section('title')
    Главная
@endsection
