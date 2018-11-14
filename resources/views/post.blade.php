@extends('layouts.app')
@section('content')
    <div class="container">
    <h2>{{ $post->title }}</h2>
    @if($post->videos->isNotEmpty())
        @php
            $video = $post->videos->first()
        @endphp
        <iframe width="100%" height="500px" src="{{ $video->iframe_link }}" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen></iframe>
    @endif
    <div class="description">
        {!! $post->description !!}
    </div>
        <div class="swiper-container attachment-slider" style="margin-bottom: 20px">
            <div class="swiper-wrapper">
            @foreach($post->getAttachments('slider') as $attachment)
                <div class="swiper-slide">
                    <img style="width: 100%" src="{{ Voyager::image($attachment->path) }}">
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
