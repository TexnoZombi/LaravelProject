
@extends('layouts.head')

@section('content')
    <div class="jumbotron mt-5 mb-0 pb-0" style="background-color: #f0fff6">
        <div class="container">
        @if (session('success'))
            <h3 class="text-success text-center">{{ session('success') }}</h3><br>
        @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card cards">
                    <div class="card-header alert-success"><h2 class="text-center">{{ __('Уведомление') }}</h2></div>
                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Поздравляю! Вы авторизованный пользователь!') }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        </div>
    </div>
@endsection

@section('title')
    Статус
@endsection
