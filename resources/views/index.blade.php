@extends('layouts.app')
@section('content')
    <div class="sayings">
        @foreach($sayings as $saying)
            <p>
                {{ $saying->author }}
            </p>
            <div class="saying-text">
                {!! $saying->text !!}
            </div>
        @endforeach
    </div>
@endsection
