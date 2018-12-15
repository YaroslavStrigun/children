@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="display-4 center">
            {{ $page->name }}
        </h2>
        @if(request()->slug == 'how-to-help')
            <div class="center">
                <img src="{{ Voyager::image(setting('site.donate')) }}">
            </div>
        @endif
        <div class="description">
            {!! $page->text !!}
        </div>
        @if($page->slug == 'gallery')
            <section class="main-slider swiper-container">
                <div class="swiper-wrapper">
                    @foreach($page->attachments as $attachment)
                            <div class="swiper-slide">
                                <img class="main-slider__image" src="{{ Voyager::image($attachment->path) }}">
                                <div class="main-slider__text">
                                    <div class="main-slider__text-container" style="max-height: 100%;!important;">
                                        {!! $attachment->text !!}
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </section>
        @else
        <div class="swiper-container attachment-slider" style="margin-bottom: 20px">
            <div class="swiper-wrapper">
                @foreach($page->getAttachments('slider') as $attachment)
                    <div class="swiper-slide">
                        <img src="{{ Voyager::image($attachment->path) }}">
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        @endif
        @if(request()->slug == 'how-to-help')
            <div class="center">
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        <p>Спасибо!</p>
                        <p>
                            Статус оплаты: {!! Session::get("msg") !!}
                        </p>
                    </div>
                @endif
                {!! \App\Services\PaymentService::getPaymentWidget() !!}
            </div>
        @endif
    </div>
@endsection
@push('footer_scripts')
    <script src="{{ asset('js/post.js') }}"></script>
@endpush
