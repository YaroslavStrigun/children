@extends('layouts.app')
@section('content')

    <section class="main-slider swiper-container">
        <div class="swiper-wrapper">
            @foreach($children_works as $work)
                @if(!is_null($work->getAttachment('main')->path))
                    <div class="swiper-slide">
                        <img class="main-slider__image" src="{{ Voyager::image($work->getAttachment('main')->path) }}">
                        <div class="main-slider__text">
                            <div class="main-slider__text-container">
                                {!! $work->short_description !!}
                            </div>
                            <a class="read-more main-slider__link"
                               href="{{ route('post', ['slug' => $work->category->slug, 'id' => $work->id]) }}">Подробнее</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <section class="review">
        <div class="container">
            <div class="review__slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach($sayings as $saying)
                        <div class="review__slide swiper-slide">
                            <div class="review__text">
                                {!! strip_tags($saying->text ) !!}
                            </div>

                            <p class="review__author">
                                {{ $saying->author }}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <section class="children">
        <h2 class="main-title">Они ждут Вашей помощи</h2>
        <div class="main-slider children-slider swiper-container">
            <div class="swiper-wrapper">
                @foreach($children as $child)
                    @if(!is_null($child->getAttachment('main')->path))
                        <div class="swiper-slide">
                            <div class="main-slider__text">
                                <div class="main-slider__text-container">
                                    {!! $child->short_description !!}
                                </div>
                                <a class="read-more child-slider__link"
                                   href="{{ route('post', ['slug' => $child->category->slug, 'id' => $child->id]) }}">Подробнее</a>
                            </div>
                            <img class="main-slider__image"
                                 src="{{ Voyager::image($child->getAttachment('main')->path) }}">
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="donate-link-wrap">
            <a class="donate-link" href="#">Пожертвовать</a>
        </div>

    </section>


        <section class="executive">
            <div class="container">
                <h2 class="main-title">Руководители проэкта</h2>

                <div class="executive__list">
                    <div class="executive__item">
                        <img class="rounded-circle"
                             src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                             width="140" height="140">
                        <p class="executive__title">Стригун Ярослав</p>
                    </div>
                    <div class="executive__item">
                        <img class="rounded-circle"
                             src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                             width="140" height="140">
                        <p class="executive__title">Орловская Нина</p>
                    </div>
                    <div class="executive__item">
                        <img class="rounded-circle"
                             src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                             width="140" height="140">
                        <p class="executive__title">Красова Мария</p>
                    </div>
                </div>

                <div class="executive__attention" role="alert">
                    <strong>Внимание, </strong> нужны волонтеры!
                </div>
            </div>
        </section>

        <div class="overlay"></div>

        @endsection
        @push('footer_scripts')
            <script src="{{ asset('js/index-page.js') }}"></script>
    @endpush
