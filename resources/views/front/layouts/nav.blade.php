<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
            <h1>SerbagunaBesar<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="#services">Layanan</a></li>
                <li><a href="#portfolio">Produk</a></li>
                <li><a href="{{ route('home.blog') }}">Blog</a></li>
                <li class="dropdown"><a href="#"><span>Kategori</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="#">{{ $category }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @auth
                    <li>
                        <a href="{{ route('logout.perform') }}">Logout</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
