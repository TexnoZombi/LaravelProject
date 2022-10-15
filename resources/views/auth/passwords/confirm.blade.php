@extends('layouts.head')

@section('content')
<div class="jumbotron mt-5" style="background-color: #f0fff6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card cards">
                    <div class="card-header alert-success"><h2 class="text-center">{{ __('Подтвердить пароль') }}</h2></div>

                    <div class="card-body">
                        {{ __('Пожалуйста, подтвердите свой пароль, прежде чем продолжить') }}

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль:') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn alert-success">
                                        {{ __('Подтвердить пароль') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                                            {{ __('Забыли свой пароль?') }}
                                        </a>
                                    @endif
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