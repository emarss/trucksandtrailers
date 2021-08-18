@extends('layout')
@section('title', $listing->name)
@section('content')

<main>

    <nav class="secondary_nav sticky_horizontal_2">
        <div class="container">
            <ul class="clearfix">
                <li><a href="#description" class="active">Showing Listing</a></li>
            </ul>
        </div>
    </nav>

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-8">
                <div id="carousel_in" class="owl-carousel owl-theme add_bottom_30">
                    <span class="magnific-gallery">
                        <a href="{{ Storage::url("listings/images/$listing->featured_image") }}" class="btn_photos"
                            title="Photo title" data-effect="mfp-zoom-in">

                            <div class="strip grid">
                                <figure style="height: 400px">
                                    <a href="{{ Storage::url("listings/images/$listing->featured_image") }}">
                                        <img src="{{ $listing->featuredImage() }}" class="img-fluid" alt="">
                                        <div class="read_more"><span>View Photos</span></div>
                                    </a>
                                </figure>
                            </div>
                        </a>
                        @if (strlen($listing->image_2) != 0)
                            <a href="{{ Storage::url("listings/images/$listing->image_2") }}" title="Photo title"
                                data-effect="mfp-zoom-in"></a>
                        @endif
                        @if (strlen($listing->image_3) != 0)
                            <a href="{{ Storage::url("listings/images/$listing->image_3") }}" title="Photo title"
                                data-effect="mfp-zoom-in"></a>
                        @endif
                    </span>
                </div>

                <section id="description">
                    <div class="detail_title_1">
                        <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i
                                class="icon_star"></i><i class="icon_star"></i></div>
                        <h1>{{ $listing->name }} <small class="address"
                                style="font-size: 14px">{{ Str::ucfirst($listing->condition) }}</small></h1>
                        <a class="address">{{ $listing->location }}</a>

                    </div>
                    <p>{!! $listing->description !!}</p>

                </section>
                <!-- /section -->
            </div>
            <!-- /col -->

            <aside class="col-lg-4" id="sidebar">
                <div class="box_detail booking">
                    <div class="price">
                        <span>{{ $listing->getPrice() }} <small>{{ $listing->currency }}</small></span>
                    </div>
                    <a href="tel:{{ $listing->cell_number }}" class=" add_top_30 btn_1 full-width purchase">Call Owner</a>
                    <a href="sms:{{ $listing->cell_number }}" class="btn_1 full-width outline wishlist"><i class="fa fa-comment"></i> Sent SMS</a>
                    @if (strlen($listing->email) != 0)<a href="mailto:{{ $listing->email }}"
                            class="btn_1 full-width outline wishlist"><i class="fa fa-envelope"></i> Sent Email</a>
                    @endif
                    @if (strlen($listing->email) != 0)<a href="https://wa.me/{{ $listing->whatsapp_number }}"
                            class="btn_1 full-width outline wishlist"><i class="fa fa-whatsapp"></i> WhatsApp</a>
                    @endif
                </div>
                <ul class="share-buttons">
                    <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                    <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
                    <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                </ul>
            </aside>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</main>
<!--/main-->
@endsection

@section('scripts')
<!-- CAROUSEL -->
<script>
    $('#carousel_in').owlCarousel({
        center: false,
        items: 1,
        loop: false,
        margin: 0
    });
</script>
@endsection


@section('styles')
<script src="https://use.fontawesome.com/033e6e96f8.js"></script>
@endsection