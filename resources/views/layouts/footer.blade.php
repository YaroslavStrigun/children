<footer>
    <div class="">
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
                <ul class="social">
                    <li class="social__item">
                        <a class="social__link icon-youtube-play" href="https://www.youtube.com/">
                        </a>
                    </li>
                    <li class="social__item">
                        <a class="social__link facebook icon-facebook" href="https://www.facebook.com/"></a>
                    </li>
                    <li class="social__item">
                        <a class="social__link icon-instagram" href="https://www.instagram.com/">
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/libs/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
@stack('footer_scripts')
