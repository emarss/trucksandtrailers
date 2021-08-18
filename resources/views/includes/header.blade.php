<header class="header_in">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div id="logo">
                    <a href="/">
                        <img src="{{ asset('img/logo-long.png') }}" height="35" alt="" class="logo_sticky">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <ul id="top_menu">
                    <li><a href="{{ route('add_listing') }}" class="btn_add">Add Listing</a></li>
                </ul>
                <!-- /top_menu -->
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <nav id="menu" class="main-menu">
                    <ul>
                        <li><span><a href="{{ route('home') }}">Home</a></span></li>
                        <li><span><a href="#0">Categories</a></span>
                            <ul>
                                @foreach (App\Category::all() as $category)
                                    <li><a href="{{ route('category', $category->category) }}">{{ ucwords($category->category) }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><span><a href="{{ route('about') }}">About Us</a></span></li>
                        <li><span><a href="{{ route('contact') }}">Contact Us</a></span></li>
                        <li><span><a href="#0">More</a></span>
                            <ul>
                                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <!-- search_mobile -->
    <div class="layer"></div>
    <div id="search_mobile">
        <a href="#" class="side_panel"><i class="icon_close"></i></a>
        <div class="custom-search-input-2">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="What are you looking..">
                <i class="icon_search"></i>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Where">
                <i class="icon_pin_alt"></i>
            </div>
            <select class="wide">
                <option>All Categories</option>
                <option>Trucks</option>
                <option>Trailers</option>
                <option>Machinery</option>
                <option>Farm</option>
                <option>Spares</option>
                <option>Services</option>
            </select>
            <input type="submit">
        </div>
    </div>
    <!-- /search_mobile -->
</header>
<!-- /header -->
