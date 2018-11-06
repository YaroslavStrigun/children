@extends('layouts.app')
@section('content')
    <div class="container">
    <h2 class="center display-4">{{ $category->name }}</h2>
    @foreach($posts as $post)
        <div class="post">
            <a class="post-title h3" href="{{ route('post', ['slug' => $category->slug, 'id' => $post->id]) }}">{{$post->title}}</a>
            <div class="main-attachment">
                @php
                    $attachment = $post->getAttachment('main');
                @endphp
                <img src="{{ Voyager::image($attachment->path) }}">
            </div>
            <div class="short-description">
                {!! $post->short_description !!}
                <a href="{{ route('post', ['slug' => $category->slug, 'id' => $post->id]) }}">Детальніше</a>
            </div>
        </div>
    @endforeach
    {{--change pagination styles in views\vendor\pagination\default.blade.php--}}
    {{ $posts->links() }}
    </div>
@endsection
