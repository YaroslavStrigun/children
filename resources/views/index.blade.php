@extends('layouts.app')
@section('content')
    <div class="main-button-container center">
        <a class="btn pay-button" href="#help-title" style="text-decoration: none">Прошу помочь</a>
        <a class="btn pay-button" href="{{ route('page', ['slug' => 'how-to-help'])}}" style="text-decoration: none">Хочу помочь</a>
        <a class="btn pay-button" href="{{ route('page', ['slug' => 'gallery'])}}" style="text-decoration: none">Благотворительная онлайн-галлерея</a>
        <a class="btn pay-button" href="{{ route('posts.by.category', ['slug' => 'social']) }}" style="text-decoration: none">Социальный статус - добродетель.</a>
    </div>
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
            {{--<a class="donate-link" href="#">Пожертвовать</a>--}}

            <button type="button" class="btn pay-button center-block">
                <a class="display-4" href="{{ route('page', ['slug' => 'how-to-help'])}}" style="text-decoration: none">Пожертвовать</a>
            </button>
        </div>



    </section>


    <section class="executive">
        <div class="container">
            <h2 class="main-title">Руководители проэкта</h2>

            <div class="executive__list">
                <div class="executive__item">
                    <img class="rounded-circle"
                         src="{{ Voyager::image(setting('site.organisator_yaroslav')) }}"
                         width="140" height="140">
                    <p class="executive__title">Стригун Ярослав</p>
                </div>
                <div class="executive__item">
                    <img class="rounded-circle"
                         src="{{ Voyager::image(setting('site.organisator_nina')) }}"
                         width="140" height="140">
                    <p class="executive__title">Орловская Нина</p>
                </div>
                <div class="executive__item">
                    <img class="rounded-circle"
                         src="{{ Voyager::image(setting('site.organisator_maria')) }}"
                         width="140" height="140">
                    <p class="executive__title">Красова Мария</p>
                </div>
            </div>

            <div class="executive__attention" role="alert">
                <strong>Внимание, </strong> нужны волонтеры!
            </div>
        </div>
    </section>
    <div class="container">
        <h2 id="help-title" class="main-title">Прошу помочь</h2>
        @include('layouts.errors')
        @include('layouts.messages')
        <div class="center">
            <img src="{{ Voyager::image(setting('site.help_phone')) }}" style="width: 20%">
        </div>
        <form class="email-form" method="post" action="{{ route('send') }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input name="email" type="email" class="form-control" placeholder="name@example.com" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="">Номер телефона</label>
                <input name="phone" type="text" class="form-control" placeholder="+380933333333" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Сообщение</label>
                <textarea name="text" class="form-control" rows="5" required placeholder="Мы, (Ф.И.О. родителей). Просим оказать финансовую помощь нашему ребёнку(Ф.И.О)">{{ old('text') }}</textarea>
            </div>
            <div class="donate-link-wrap">
                <button type="submit" class="btn pay-button center-block">
                    <p class="display-4" style="text-decoration: none">Отправить</p>
                </button>
            </div>
        </form>
    </div>

@endsection
@push('footer_scripts')
    <script src="{{ asset('js/index-page.js') }}"></script>
@endpush
