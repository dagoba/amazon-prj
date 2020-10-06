<header class="block header">
    <div class="block--in">
        <div class="header--contact">
            @if (config('app.locale') == 'en')
                <a href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}" class="header--lang header--lang_ru">Русский</a>
            @elseif (config('app.locale') == 'ru')
                <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="header--lang header--lang_en">English</a>
            @endif
            <a href="tel:+61863650475" rel="nofollow" class="header--contact_link sprite_before">+61863650475</a>
            <a href="mailto:support@amz-corp.com" rel="nofollow"class="header--contact_link header--contact_link_mail sprite_before">support@amz-corp.com</a>
            <div class="menu outhamb">
                <div class="hambergerIcon"></div>
            </div>
        </div>
        <div class="header--nav">
            <a href="{{ route('welcome') }}" title="{{ config('app.name') }}" class="header--logo sprite_logo"><span class="header--name">AMZ CORPORATE PTY LTD</span></a>
            <nav class="header--navlink">
                <ul class="nav-block">
                    <li class="nav-block-item"><a href="{{route('all-shops')}}" class="nav-block_link">@lang('menu.shop')</a></li>
                    {{-- <li class="nav-block-item"><a href="{{route('about-project')}}" class="nav-block_link">@lang('menu.about')</a></li> --}}
                    <li class="nav-block-item"><a href="{{route('about')}}" class="nav-block_link">@lang('menu.about-us')</a></li>
                    <li class="nav-block-item"><a href="{{route('how-it-works')}}" class="nav-block_link">@lang('menu.faq')</a></li>
                    <li class="nav-block-item"><a href="{{route('reviews')}}" class="nav-block_link">@lang('menu.review')</a></li>
                    <li class="nav-block-item"><a href="{{route('affileate-program')}}" class="nav-block_link">@lang('menu.partner')</a></li>
                    <li class="nav-block-item"><a href="{{route('contact')}}" class="nav-block_link">@lang('menu.contact')</a></li>
                </ul>
            </nav>
            <div class="header--usernav">
                @guest
                    <a href="{{ route('login') }}" class="btn -margin-right-10 -large">@lang('menu.login')</a>
                    <a href="{{ route('register') }}" class="btn btn-grad -large">@lang('menu.registration')</a>
                @else
                    <a href="{{route('cabinet')}}" class="profile">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-grad">Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>