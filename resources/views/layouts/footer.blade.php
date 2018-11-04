<footer>
    <div class="container-fluid">
        <div class="footer-wrapper">
            <div class="footer__item footer__logo">
                <a class="logotype" href="{{ route('index') }}">
                    Поддержка
                </a>
            </div>
            <div class="footer__item footer__list menu_medium">

                <ul class="menu_list">
                    @foreach($categories as $category)
                    <li class="menu-item">
                        <a href="{{ route('posts.by.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__item footer__list menu_light">

                <ul class="menu_low">
                    @foreach($pages as $page)
                    <li class="menu-item">
                        <a href="{{ route('page', ['slug' => $page->slug])}}">{{ $page->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__item footer__social">
                <p class="social_head">Вопросы</p>

                <form class="social_form" method="post" action="">
                    <input class="form_text" type="email" name="ne" placeholder="Введите Ваш e-mail" required="">

                    <button class="form_submit" type="submit" value="">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/libs/swiper/swiper.min.js') }}"></script>
@stack('footer_scripts')
