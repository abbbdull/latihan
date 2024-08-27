<!-- resources/views/partials/navbar.blade.php -->
<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-9">
                    <div id="colorlib-logo"><a href="index.html">W!</a></div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <form action="#" class="search-wrap">
                        <div class="form-group">
                            <input type="search" class="form-control search" placeholder="Search">
                            <button class="btn btn-primary submit-search text-center" type="submit"><i
                                    class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a
                                href="{{ route('home') }}">Home</a></li>
                        <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                            <a href="{{ route('about') }}">About</a>
                        </li>
                        <li class="{{ request()->routeIs('checkout') ? 'active' : '' }}">
                            <a href="{{ route('checkout') }}">Checkout</a>
                        </li>

                        <li class="{{ request()->routeIs('produk.contact') ? 'active' : '' }}">
                            <a href="{{ route('produk.contact') }}">Contact</a>
                        </li>

                        {{-- <li class="{{ request()->routeIs('wishlist') ? 'active' : '' }}">
                            <a href="{{ route('wishlist') }}">Wishlist</a>
                        </li> --}}

                        <li class="{{ request()->routeIs('complete') ? 'active' : '' }}">
                            <a href="{{ route('complete') }}">Order Complete</a>
                        </li>

                        <li class="cart {{ request()->routeIs('cart') ? 'active' : '' }}">
                            <a href="{{ route('cart') }}"><i class="icon-shopping-cart"></i> Cart </a>
                        </li>
                        <li class="logout {{ request()->routeIs('logout.proses') ? 'active' : '' }}">
                            <a href="{{ route('logout.proses') }}">Logout</a>
                        </li>
                        {{ session('user_name') }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
