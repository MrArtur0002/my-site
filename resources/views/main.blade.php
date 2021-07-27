<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Главная страница</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset("css/styles.css") }}">
        <link rel="stylesheet" href="{{ URL::asset("css/bootstrap.min.css") }}">
        <link rel="stylesheet" href="{{ URL::asset("css/owl.carousel.css") }}">
        <link rel="stylesheet" href="{{ URL::asset("css/owl.theme.default.css") }}">
    </head>
    <body>
        <header>
            <div class="container f-height">
                <div class="d-flex align-items-center justify-content-center f-height">
                    <ul>
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">Шаблоны</a></li>
                        <li><a href="#">О себе</a></li>
                        <li><a href="#">Проекты</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <section class="main-banner">
                <div class="main-slider owl-carousel owl-theme">
                    <div class="main-slider__item">
                        <img src="{{URL::asset("images/main-slider/slide-1.jpg")}}" alt="Изображение для слайда" />
                    </div>
                    <div class="main-slider__item">
                        <img src="{{URL::asset("images/main-slider/slide-2.jpg")}}" alt="Изображение для слайда" />
                    </div>
                    <div class="main-slider__item">
                        <img src="{{URL::asset("images/main-slider/slide-3.jpg")}}" alt="Изображение для слайда" />
                    </div>
                    <div class="main-slider__item">
                        <img src="{{URL::asset("images/main-slider/slide-4.jpg")}}" alt="Изображение для слайда" />
                    </div>
                </div>
            </section>
        </main>
        <footer>

        </footer>

        <script src="{{ URL::asset("js/jquery.min.js") }}"></script>
        <script src="{{ URL::asset("js/owl.carousel.min.js") }}"></script>
        <script src="{{ URL::asset("js/main.js") }}"></script>
    </body>
</html>
