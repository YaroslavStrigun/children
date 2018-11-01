@extends('layouts.app')
@section('content')
    <h2>{{ $category->name }}</h2>
    @foreach($posts as $post)
        <a class="post-title" href="{{ route('post', ['slug' => $category->slug, 'id' => $post->id]) }}">{{$post->title}}</a>
        <div class="main-attachment">
            @php
                $attachment = $post->getAttachment('main');
            @endphp
            <img src="{{ Voyager::image($attachment->path) }}">
        </div>
        <div class="short-description">
            <p>{{ $post->short_description }}</p>
            <a href="{{ route('post', ['slug' => $category->slug, 'id' => $post->id]) }}">Детальніше</a>
        </div>
    @endforeach
    {{--change pagination styles in views\vendor\pagination\default.blade.php--}}
    {{ $posts->links() }}
@endsection
