@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="display-4 center">
            {{ $page->name }}
        </h2>
        <div class="description">
            {!! $page->text !!}
        </div>
        @foreach($page->attachments as $attachment)
            <img src="{{ Voyager::image($attachment->path) }}">
        @endforeach
    </div>
@endsection
