@foreach($categories as $category)
    <a href="{{ route('posts.by.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
@endforeach
