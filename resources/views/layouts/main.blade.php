<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Блюда</title>
    <link href={{asset('css/styles.css')}} rel="stylesheet" type="text/css" />
    <script
        class="jsbin"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script
        class="jsbin"
        src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <header class="header">
        <div class="header-tag">
            Складской учёт <sup>β</sup>
            <div class="user-bar">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                            @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                            @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                        @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>

        </div>
    </header>

    @yield('popup')



    <div class="hero">
        <div class="sidebar">
            <a href="{{route('dish.index')}}">Блюда</a>
            <a href="{{route('category.index')}}">Категории</a>
            <a href="{{route('report.index')}}">Отчёты</a>
        </div>
        <div class="content">
            <div class="top-menu">
                @yield('top-menu')
            </div>

            @yield('content')
        </div>
    </div>
    <script>
    const popup = document.querySelector('.popup');
    const updatepopup = document.querySelector('.updatepopup');
        function showPopup() {
            popup.classList.add('open');

    }
    function hidePopup() {
        popup.classList.remove('open');
    }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#dish-image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
  }
}
    </script>
</body>
</html>
