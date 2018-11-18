@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="display-4 center">
            {{ $page->name }}
        </h2>
        <div class="description">
            {!! $page->text !!}
        </div>
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
    </div>
@endsection
@push('footer_scripts')
    <script src="{{ asset('js/post.js') }}"></script>
@endpush
