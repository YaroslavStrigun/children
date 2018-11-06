@extends('layouts.app')
@section('content')

    <div class="main-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="http://xn--e1afjir7df.xn--d1acj3b/img/kids8.jpg">
            </div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
            <div class="swiper-slide">Slide 10</div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div class="container">
    <div id="carousel">
        <div class="btn-bar">
            <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a></div>
        </div>
        <div id="slides">
            <ul>
                @foreach($sayings as $saying)
                    <li class="slide">
                        <div class="quoteContainer">
                            <p class="quote-phrase"><span class="quote-marks">"</span>
                                {!! strip_tags($saying->text ) !!}
                            </p>
                        </div>
                        <div class="authorContainer">
                            <p class="quote-author">
                                {{ $saying->author }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
        <button type="button" class="btn pay-button center-block">
            <a class="display-4" href="#" style="text-decoration: none">Пожертвовать</a>
        </button>

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="  width="140" height="140">
                    <p>Стригун Ярослав</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="  width="140" height="140">
                    <p>Орловская Нина Константиновна</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="140" height="140">
                    <p>Красова Мария</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

        </div>
    <div class="alert alert-primary center" role="alert">
        <strong>Внимание, </strong> нужны волонтеры!
    </div>

    </div>
@endsection
@push('footer_scripts')
    <script src="{{ asset('js/index-page.js') }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
