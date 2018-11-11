@extends('layouts.app')
@section('content')
    <div class="container">
    <h2>{{ $post->title }}</h2>
    <div class="description">
        {!! $post->description !!}
    </div>
    @foreach($post->getAttachments('slider') as $attachment)
        <img src="{{ Voyager::image($attachment->path) }}">
    @endforeach
        @if($post->videos->isNotEmpty())
            @php
                $video = $videos->first()
            @endphp
                <iframe width="100%" height="100%" src="{{ $video->iframe_link }}" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>
        @endif
    </div>
@endsection
