<footer class="plus_border">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-target="#collapse_ft_2">Categories</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_2">
                    <ul class="links">
                        @foreach (App\Category::all() as $category)
                            <li><a
                                    href="{{ route('category', $category->category) }}">{{ ucwords($category->category) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-target="#collapse_ft_1">Quick Links</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_1">
                    <ul class="links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-target="#collapse_ft_3">Contacts</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_3">
                    <ul class="contacts">
                        <li><i class="ti-home"></i>615 Zvaenzana Road<br>New Marimba Park <br>Harare - Zimbabwe</li>
                        <li><i class="ti-headphone-alt"></i><a href="tel:+263778505554">+263 77 850 5554</a></li>
                        <li><i class="ti-email"></i><a
                                href="mailto:info@trucksandtrailers.co.zw">info@trucksandtrailers.co.zw</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-target="#collapse_ft_4">Keep in touch</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_4">
                    <div id="newsletter">
                        <form method="post" action="{{ route('newsletter') }}" name="newsletter_form"
                            id="newsletter_form">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email_newsletter" required class="form-control"
                                    placeholder="Your email">
                                <input type="submit" value="Submit" id="submit-newsletter">
                            </div>
                        </form>
                    </div>
                    <div class="follow_us">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a href="#0"><i class="ti-facebook"></i></a></li>
                            <li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#0"><i class="ti-linkedin"></i></a></li>
                            <li><a href="#0"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row">
            <div class="col-lg-12 text-center">
                <ul id="additional_links">
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                    <li><span>&copy; {{ now()->year }} Trucks & Trailers</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div>
<!-- Back to top button -->
