@extends('layouts.head')

@section('content')
<div class="jumbotron mt-5" style="background-color: #f0fff6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card cards">
                    <div class="card-header alert-success"><h2 class="text-center">{{ __('Сбросить пароль') }}</h2></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email адресс') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn alert-success">
                                        {{ __('Отправить ссылку для сброса пароля?') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
  Подтверждение пароля
@endsection
