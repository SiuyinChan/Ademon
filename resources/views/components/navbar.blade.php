<nav class="navbar">
    <div class="nav-left">
        <a href="/" class="logo"> Ademon |</a>
        <p class="slogan">Your Marketplace</p>
    </div>
    <div class="nav-right">
        <img src="/icons/icon-heart.svg" alt="">
        {{--NOT IMPLEMENTED--}}
        <a href="/">Wishlist</a>
        <img src="/icons/icon-user.svg" alt="">
        @guest
        @if (Route::has('login'))
                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                <span>/</span>
            @endif

            @if (Route::has('register'))
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif

            @else

            <a href="/user-profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <span>/</span>
            <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        @endguest
            <img src="/icons/icon-language.svg" alt="">
            {{--NOT IMPLEMENTED--}}
            <a href="/">en</a>
    </div>
</nav>
