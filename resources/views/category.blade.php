@extends('layout')
@section('title', $pageTitle)
@section('content')
    <main>
        <div id="results">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-10">
                        <h4><strong>Showing Category:</strong> {{ Str::ucfirst($category) }}</h4>
                    </div>
                    <div class="col-lg-9 col-md-8 col-2">
                        <a href="#0" class="side_panel btn_search_mobile"></a>
                        <!-- /open search panel -->
                        <div class="row no-gutters custom-search-input-2 inner">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="What are you looking for...">
                                    <i class="icon_search"></i>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <select class="wide">
                                <option>All Categories</option>	
                                <option>Shops</option>
                                <option>Hotels</option>
                                <option>Restaurants</option>
                                <option>Bars</option>
                                <option>Events</option>
                                <option>Fitness</option>
                            </select>
                            </div>
                            <div class="col-lg-1">
                                <input type="submit">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>

        <!-- /results -->
        <div class="filters_listing sticky_horizontal">
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
        </div>

        <div class="container margin_60_35">

            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="strip grid">
                        <figure>
                            <a href="#0" class="price_bt">30,000USD</a>
                            <a href="detail.html"><img src="img/location_1.jpg" class="img-fluid" alt="">
                                <div class="read_more"><span>Read more</span></div>
                            </a>
                            <small>Truck</small>
                        </figure>
                        <div class="wrapper">
                            <h3><a href="detail.html">Fuel Tanker Trailer</a></h3>
                            <small>Condition: New</small>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                        </div>
                        <ul>
                            <li><a class="btn_2 font-weight-bold">View Details</a></li>
                            <li><a class="btn_3 btn-danger ml-2"><i class="icon-call" ></i></a></li>
                            <li><a class="btn_3 btn-danger ml-2"><i class="icon-email" ></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /row -->

            <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>

        </div>
        <!-- /container -->

    </main>
    <!--/main-->
@endsection
