<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Блюда</title>
    <link href={{asset('css/styles.css')}} rel="stylesheet" type="text/css" />

</head>
<body>
    <header class="header">
        <nav class="navigation"></nav>
    </header>

    @yield('popup')

    <div class="hero">
        <div class="sidebar">
            <a href="{{route('menu.index')}}">Блюда</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
        <div class="content">
            <div class="top-menu">
                @yield('top-menu')
            </div>
            <div class="main">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
    //const popupLinks = document.querySelector('.popup-link');
    //const body = document.querySelector('body');
    //const lockPadding = document.querySelectorAll(".lock-padding");
    //const popup = document.querySelector('.popup');
    //let unlock = true;

    //const timeout = 800;

    //popupLinks.addEventListener('click', () => {
    //    if (popup.style.display === "none") {
    //        console.log('123');
    //    } else {
    //        console.log(popup.style.display);
    //    }
    const popup = document.querySelector('.popup');
    function showPopup() {
        popup.classList.add('open');
    }
    function hidePopup() {
        popup.classList.remove('open');
    }

    </script>
</body>
</html>
