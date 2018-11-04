@foreach($categories as $category)
    <a href="{{ route('posts.by.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
@endforeach
@foreach($pages as $page)
    <a href="{{ route('page', ['slug' => $page->slug])}}">{{ $page->name }}</a>
@endforeach
