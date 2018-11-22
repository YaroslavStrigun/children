<header class="header">
    <div class="container-fluid">
        <div class="header-wrap">
            <div class="burger-menu">
                <span class="burger-menu__line"></span>
                <span class="burger-menu__line"></span>
                <span class="burger-menu__line"></span>
            </div>
            <a href="/" class="logo">
                <img src="{{ Voyager::image(setting('site.logo')) }}">
            </a>
            <div class="header-contact">
                <a class="header-contact__link" href="tel:{{ setting('site.admin_phone', '+380507000155') }}">{{ setting('site.admin_phone', '+380507000155') }}</a>
                <p class="header-contact__link">{{ setting('site.admin_mail', 'yastrigun@mail.com') }}</p>
            </div>
        </div>
    </div>
</header>

<div class="slide-menu">
    <div class="slide-menu__wrapper">
        <span class="close" href="#"></span>
        <ul class="slide-menu__list">
            @foreach($categories as $category)
            <li class="slide-menu__item">
                <a class="slide-menu__link" href="{{ route('posts.by.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
            </li>
            @endforeach
        </ul>
        <ul class="slide-menu__list">
            @foreach($pages as $page)
                <li class="slide-menu__item">
                    <a class="slide-menu__link" href="{{ route('page', ['slug' => $page->slug])}}">{{ $page->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
