@extends('layout')
@section('title', $pageTitle)
@section('content')
<main>
    <div id="results">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-10">
                    <h4>{{ $pageTitle }}</h4>
                </div>
                <div class="col-md-8 col-2">
                    <a href="#0" class="side_panel btn_search_mobile"></a>
                    <!-- /open search panel -->
                    <form method="POST" action="{{ route('search') }}" class="row no-gutters custom-search-input-2 inner">
                        @csrf
                        <div class="col-lg-7">
                            <div class="form-group">
                                <input class="form-control" name="search" type="text" placeholder="What are you looking for...">
                                <i class="icon_search"></i>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <select class="wide">
                                <option value="">All Categories</option>
                                @foreach (App\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ ucwords($category->category) }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

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
                            <a href="#0" class="price_bt">{{ $listing->getPrice() }} {{ $listing->currency }}</a>
                            <a href="{{ route('listing.show', $listing->slug) }}"><img src="{{ $listing->featuredImage() }}" class="img-fluid" alt="">
                                <div class="read_more"><span>Read more</span></div>
                            </a>
                            <small>{{ $listing->getCategory() }}</small>
                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{ route('listing.show', $listing->slug) }}">{{ $listing->name }}</a></h3>
                            <small>Condition: {{ Str::ucfirst($listing->condition) }}</small>
                            <p>{{ $listing->except() }}</p>
                        </div>
                        <ul>
                            <li><a class="btn_2 font-weight-bold">View Details</a></li>
                            <li><a class="btn_3 btn-danger ml-2"><i class="icon-call"></i></a></li>
                            <li><a class="btn_3 btn-danger ml-2"><i class="icon-email"></i></a></li>
                        </ul>
                    </div>
                </div>
            @empty
                <div class="text-center col-md-12 mb-5 mt-4">
                    No results found.
                </div>
            @endforelse

        </div>
        <!-- /row -->

        {{-- <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p> --}}

    </div>
    <!-- /container -->

</main>
<!--/main-->
@endsection
