@extends('layouts.head')

@section('content')
<div class="jumbotron mt-5" style="background-color: #f0fff6">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card cards">
                <div class="card-header alert alert-success"><h2 class="text-center">{{ __('Подтвердите свой адрес электронной почты') }}</h2></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div role="alert">
                            {{ __('На ваш адрес электронной почты была отправлена новая ссылка для подтверждения') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения') }}
                    {{ __('Если вы не получили электронное письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите здесь, чтобы запросить другой') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('title')
    Верефикация
@endsection
