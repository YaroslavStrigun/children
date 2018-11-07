@extends('layouts.app')
@section('content')

    <section class="main-slider swiper-container">
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
        <div class="swiper-video swiper-container">
            <div class="swiper-wrapper">
                @foreach($children_works as $work)
                    @if($work->videos->isNotEmpty())
                        <div class="swiper-slide">
                            <iframe width="560" height="315" src="{{ $work->videos->first()->iframe_link }}"
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <button type="button" class="btn pay-button center-block">
            <a class="display-4" href="#" style="text-decoration: none">Пожертвовать</a>
        </button>

        <div class="container marketing">

        <div class="executive">
            <div class="container">
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
                        <p class="executive__title">Стригун Ярослав</p>
                    </div>
                    <div class="executive__item">
                        <img class="rounded-circle"
                             src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                             width="140" height="140">
                        <p class="executive__title">Стригун Ярослав</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-primary center" role="alert">
            <strong>Внимание, </strong> нужны волонтеры!
        </div>

    </section>


    <div class="overlay"></div>

@endsection
@push('footer_scripts')
    <script src="{{ asset('js/index-page.js') }}"></script>
@endpush
