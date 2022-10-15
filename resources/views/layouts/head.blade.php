<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Марк Отто, Джейкоб Торнтон и участники Bootstrap">
    <meta name="generator" content="Hugo 0.101.0">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.su/docs/4.6/examples/jumbotron/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/1.png') }}">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body style="background-color: #f0fff6">
    <nav class="navbar navbar-expand-md navbar-dark font-weight-bolder fixed-top" style="background-color: #00a550">
    <button 
        class="navbar-toggler" 
        type="button" 
        data-toggle="collapse" 
        data-target="#navbarsExampleDefault" 
        aria-controls="navbarCollapse" 
        aria-expanded="false" 
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <a 
                class="navbar-brand" 
                href="{{ Route('home') }}"  
                style="color: #fff3cd"
            >
                <img class="mr-2"src="{{ asset('images/1.png') }}" width="45" height="45"  alt="Аватар">CatAd
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ Route('home') }}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a 
                        class="nav-link dropdown-toggle" 
                        href="{{ Route('ads') }}" 
                        role="button" 
                        data-toggle="dropdown" 
                        aria-expanded="false"
                    >
                        Объявления
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ Route('ads') }}">Все объявления</a>
                        @if(Auth::check())
                        <a class="dropdown-item" href="{{ Route('adsAdd') }}">Написать объявление</a>
                        <a class="dropdown-item" href="{{ Route('adsPublished') }}">Опубликованные объявление</a>
                        <a class="dropdown-item" href="{{ Route('adsNotPublished') }}">Объявления на модерации</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a 
                        class="nav-link dropdown-toggle" 
                        href="{{ Route('help') }}" 
                        role="button" 
                        data-toggle="dropdown" 
                        aria-expanded="false"
                    >
                        Обратная связь
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ Route('help') }}">Отправить вопрос</a>
                        @if(Auth::check())
                        <a class="dropdown-item" href="{{ Route('helpAll') }}">Список вопросов</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ Route('contacts') }}">Контакты</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                    <li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                        @else
                        <div class="btn-group dropleft">
                            <div 
                                type="button" 
                                class="btn dropdown-toggle" 
                                style="color: #fff3cd" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false"
                            >
                                <b class="nik">{{ Auth::user()->name }}</b>
                            </div>
                            <div class="dropdown-menu mt-4 mr-2">
                                <a 
                                    class="dropdown-item" 
                                    href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                >
                                    {{ __('Выйти') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>    
    </nav>

    <main id="top" role="main">
        @yield('content')
    </main>

    <div class="d-flex justify-content-end mr-3">
    <a href="#top"><img class="btn-up"  src="{{ asset('images/4.png') }}" width="70" height=" 70"  alt="jpg"></a> 
    </div>

    <hr style="background-color: #00a550">

    <footer class="ml-3">
        <p>&copy; Компания 2017-2022</p>
    </footer>

    <script 
        src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"             integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous">
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
        crossorigin="anonymous">
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" 
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" 
        crossorigin="anonymous">
    </script>
</body>
</html>
