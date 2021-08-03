<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                        <img src="assets/images/klassy-logo.png">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="#top" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        @if(count($foods))
                        <li><a href="#menu">Menu</a></li>
                        @endif
                        <li><a href="#chefs">Chefs</a></li>

                        <li><a href="#reservation">Contact Us</a></li>

                        @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="menu-button" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                        <li>
                            <button class="menu-button" onclick="window.location.href='/login'">Cart [ 2 ]</button></li>
                        @else
                        <li><button class="menu-button" onclick="window.location.href='/login'">Log in</button></li>
                        @endauth
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
