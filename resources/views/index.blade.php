@extends('layouts.app')
@section('content')

    <div class="main-slider swiper-container">
        <div class="swiper-wrapper">
            @foreach($children as $child)
                @if(!is_null($child->getAttachment('main')->path))
                    <div class="swiper-slide">
                        <img class="main-slider__image" src="{{ Voyager::image($child->getAttachment('main')->path) }}">
                        <div class="main-slider__text">{!! $child->short_description !!}</div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
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
                    <img class="rounded-circle"
                         src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                         width="140" height="140">
                    <p>Стригун Ярослав</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle"
                         src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                         width="140" height="140">
                    <p>Орловская Нина Константиновна</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-circle"
                         src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                         width="140" height="140">
                    <p>Красова Мария</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

        </div>
        <div class="alert alert-primary center" role="alert">
            <strong>Внимание, </strong> нужны волонтеры!
        </div>

    </div>


    <div class="overlay"></div>

@endsection
@push('footer_scripts')
    <script src="{{ asset('js/index-page.js') }}"></script>
@endpush
