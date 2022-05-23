@extends('layout')
@section('title', $pageTitle)
@section('content')
    <main>
        <section class="hero_single version_4">
            <div class="wrapper">
                <div class="container">
                    <h3>Find what you need!</h3>
                    <p>Explore the most reliable market for trucks and trailers in Zimbabwe.</p>
                    <form method="POST" action="{{ route('search') }}">
                        @csrf
                        <div class="row no-gutters custom-search-input-2">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input @isset($prevSearch) value="{{ $prevSearch }}" @endisset class="form-control"
                                        name="search" type="text" placeholder="What are you looking for...">
                                    <i class="icon_search"></i>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <select name="category" class="wide">
                                    <option value="">All Categories</option>
                                    @foreach (App\Category::all() as $category)
                                        <option @isset($prevCategory)
                                            {{ $prevCategory == $category->id ? 'selected' : '' }} @endisset
                                            value="{{ $category->id }}">{{ ucwords($category->category) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Search">
                            </div>
                        </div>
                        <!-- /row -->
                    </form>
                    <ul class="counter">
                        <li>Buy and Sell Trucks & Trailers.</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- /hero_single -->

        @if (App\Category::all()->count() != 0)
            <div class="bg_color_1">
                <div class="container margin_80_55">
                    <div class="main_title_2">
                        <span><em></em></span>
                        <h2>Popular Categories</h2>
                        <p>The most popular categories of listings.</p>
                    </div>
                    <div class="row justify-content-center">
                        @foreach (App\Category::all() as $category)
                            <div class="col-lg-2 col-md-4 col-6">
                                <a href="{{ route('category', $category->category) }}" class="box_cat_home">
                                    <img height="60px" src="{{ "/img/icons/". Str::slug($category->category) .".png" }}" >
                                    <h3>{{ ucwords($category->category) }}</h3>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /bg_color_1 -->
        @endif

        <!-- /results -->
        {{-- <div class="filters_listing sticky_horizontal">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="conditions">
                        <a for="all">All</a>
                        <a for="popular">Preowned</a>
                        <a for="latest">New</a>
                    </div>
                </li>

                <li>
                    <a class="btn_icon" href="#collapseMap"><i class="mr-2 arrow_up-down_alt"></i> Sort Desc</a>
                    <a class="btn_icon" href="#collapseMap"><i class="mr-2 arrow_up-down_alt"></i> Sort Asc</a>
                </li>
            </ul>
        </div>
    </div> --}}

        <div class="container margin_60_35">

            <div class="row">
                @forelse ($listings as $listing)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="strip grid">
                            <figure>
                                <a class="price_bt">{{ $listing->getPrice() }} {{ $listing->currency }}</a>
                                <a href="{{ route('listing.show', $listing->slug) }}"><img
                                        src="{{ $listing->featuredImage() }}" class="img-fluid" alt="">
                                    <div class="read_more"><span>Read more</span></div>
                                </a>
                                <small>{{ $listing->getCategory() }}</small>
                            </figure>
                            <div class="wrapper">
                                <h3><a href="{{ route('listing.show', $listing->slug) }}">{{ $listing->name }}</a>
                                </h3>
                                <small>Condition: {{ Str::ucfirst($listing->condition) }}</small>
                                <p>{{ $listing->except() }}</p>
                            </div>
                            <ul>
                                <li><a href="{{ route('listing.show', $listing->slug) }}"
                                        class="btn_2 font-weight-bold">View Details</a></li>
                                <li><a href="tel:{{ $listing->cell_number }}" class="btn_3 btn-danger ml-2"><i
                                            class="icon-call"></i></a></li>

                                @if (strlen($listing->email) != 0)
                                    <li><a href="mailto:{{ $listing->email }}" class="btn_3 btn-danger ml-2"><i
                                                class="icon-email"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="text-center col-md-12 mb-5 mt-4">
                        No results found.
                    </div>
                @endforelse

            </div>
            {{ $listings->links() }}
            <!-- /row -->

            {{-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> --}}

        </div>
        <!-- /container -->

    </main>
    <!--/main-->
@endsection
