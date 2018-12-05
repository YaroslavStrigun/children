@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="center display-4">{{ $category->name }}</h2>
        @if($category->slug == 'social')
            <div class="center">
                <img src="{{ Voyager::image(setting('site.volonter')) }}">
            </div>
        @endif
        <p>{!! $category->description !!}</p>
        @foreach($posts as $post)
            <div class="post row">
                <div class="short-description col-md-7">
                    <div class="featurette-heading">
                        <a class="post-title h3" href="{{ route('post', ['slug' => $category->slug, 'id' => $post->id]) }}">{{$post->title}}</a>
                        {!! $post->short_description !!}
                        <a href="{{ route('post', ['slug' => $category->slug, 'id' => $post->id]) }}">Подробнее</a>
                    </div>
                </div>
                <div class="main-attachment col-md-5">
                    @php
                        $attachment = $post->getAttachment('main');
                    @endphp
                    <img class="featurette-image img-fluid mx-auto" src="{{ Voyager::image($attachment->path) }}">
                </div>
            </div>
        @endforeach
        {{--change pagination styles in views\vendor\pagination\default.blade.php--}}
        {{ $posts->links() }}
    </div>
@endsection
