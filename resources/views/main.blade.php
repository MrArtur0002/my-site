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
        @include('header')
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
            <section class="page-blocks">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="page-item">
                                <div class="page-item-content">
                                    <div class="item-title"> О себе</div>
                                    <div class="item-content">
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/diplom.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                Бакалавр (УГАТУ)
                                            </div>
                                        </div>
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/diplom.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                Магистр (УГАТУ)
                                            </div>
                                        </div>
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/front.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                Frontend Dev
                                            </div>
                                        </div>
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/backend.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                Backend Dev
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="page-item">
                                <div class="page-item-content">
                                    <div class="item-title"> Проекты </div>
                                    <div class="item-content">
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/port.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                2 Проекта
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="page-item">
                                <div class="page-item-content">
                                    <div class="item-title"> Манчкин</div>
                                    <div class="item-content">
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/deck-cards.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                Колода из 200 карт
                                            </div>
                                        </div>
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/race.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                6 видов рас
                                            </div>
                                        </div>
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/class.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                8 видов классов
                                            </div>
                                        </div>
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/icon-1.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                2 режима игры
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <div class="page-item">
                                <div class="page-item-content">
                                    <div class="item-title"> Форум</div>
                                    <div class="item-content">
                                        <div class="item-content-line d-flex">
                                            <div class="item-content-line__icon">
                                                <img src="{{URL::asset("images/icons/port.png")}}" />
                                            </div>
                                            <div class="item-content-line__text">
                                                2 Проекта
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        @include('footer')

        <script src="{{ URL::asset("js/jquery.min.js") }}"></script>
        <script src="{{ URL::asset("js/owl.carousel.min.js") }}"></script>
        <script src="{{ URL::asset("js/main.js") }}"></script>
    </body>
</html>
