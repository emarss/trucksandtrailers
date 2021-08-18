@extends('layout')
@section('title', $pageTitle)
@section('content')
<div class="sub_header_in">
    <div class="container">
        <h1>About Us</h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->

<main>
    <div class="container margin_80_55">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Why Choose Sparker</h2>
            <div class="row justify-content-center">
                <div class="col-md-10 mt-4">
                    <p>A common market for trucks and trailers in Zimbabwe. Promoting local builders by selling their
                        products.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <a class="box_feat" href="#0">
                    <i class="pe-7s-rocket"></i>
                    <h3>Our Mission</h3>
                    <p>Our missions is to market and promote the transport industry in Zimbabwe.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a class="box_feat" href="#0">
                    <i class="pe-7s-shield"></i>
                    <h3>Our Values</h3>
                    <p>Respect everyone, and do every job to the best of you abilty.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a class="box_feat" href="#0">
                    <i class="pe-7s-global"></i>
                    <h3>Our Vision</h3>
                    <p>To build the biggest platform for buying and selling trucks & trailers</p>
                </a>
            </div>
        </div>
        <!--/row-->
    </div>
</main>
<!--/main-->
@endsection
