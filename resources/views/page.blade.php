@extends('layouts.app')
@section('content')
    <h2>
        {{ $page->name }}
    </h2>
    <div class="description">
        {!! $page->text !!}
    </div>
    @foreach($page->attachments as $attachment)
        <img src="{{ Voyager::image($attachment->path) }}">
    @endforeach
@endsection
