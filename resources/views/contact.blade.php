@extends('layout')
@section('title', $pageTitle)
@section('content')
<div class="sub_header_in">
    <div class="container">
        <h1>Contacts Us</h1>
    </div>
    <!-- /container -->
</div>
<!-- /sub_header -->

<main>
    <div class="container margin_60_35">
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 pr-xl-5">
                <div class="main_title_3">
                    <span></span>
                    <h2>Send us a message</h2>
                    <p>Our support team will respond immediately</p>
                </div>
                <form method="post" action="{{ route('feedback') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" required type="text" name="name">
                                @error('name')
                                    <div class="text-danger my-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" required type="email" name="email">
                                @error('email')
                                    <div class="text-danger my-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile Phone</label>
                                <input class="form-control" required type="text" name="phone">
                                @error('phone')
                                    <div class="text-danger my-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" required name="message" style="height:150px;"></textarea>
                        @error('message')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact">
                    </p>
                </form>
            </div>
            <div class="col-xl-5 col-lg-6 pl-xl-5">
                <div class="box_contacts">
                    <i class="ti-help-alt"></i>
                    <h2>Questions?</h2>
                    <a href="tel:+263778505554">+263 77 850 5554</a> - <a
                        href="mailto:info@trucksandtrailers.co.zw">info@trucksandtrailers.co.zw</a>
                </div>
                <div class="box_contacts">
                    <i class="ti-home"></i>
                    <h2>Address</h2>
                    615 Zvaenzana Road<br>New Marimba Park <br>Harare - Zimbabwe
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
</main>
<!--/main-->
@endsection
