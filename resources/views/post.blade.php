@extends('layouts.app')
@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->description }}</p>
    @foreach($post->getAttachments('slider') as $attachment)
        <img src="{{ Voyager::image($attachment->path) }}">
    @endforeach
    @foreach($post->videos as $video)
        <iframe width="100%" height="100%" src="{{ $video->iframe_link }}" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen></iframe>
    @endforeach
@endsection
