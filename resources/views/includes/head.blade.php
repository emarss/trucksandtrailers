<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Trucks, Trailer, market, buy trucks, buy trailers, Zimbabwe" />
<meta name="description"
    content="A common market for trucks, trailers, farm equipmemnt, machinery, spares and services.">
<meta name="author" content="emarss.co.zw">

<!-- Favicons-->
<link rel="shortcut icon" href="img/favicon.png" type="image/png">

<!-- GOOGLE WEB FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">


<meta property="og:image" content="https://trucksandtrailers.co.zw/img/og-image.png">
<meta property='og:locale' content='en_US'>
<meta property='og:site_name' content='Trucks & Trailers Zimbabwe'>
<meta property='og:url' content='{{ Request::url() }}'>
@if (isset($listing) && Request::is('listing/*'))
    <meta property='og:type' content='article'>
    <meta property='og:title' content='{{ $listing->name }}'>
    <meta property='og:description' content='{{ $listing->except() }}'>
@else
    <meta property='og:type' content='website'>
    <meta property='og:title' content='Home'>
    <meta property='og:description'
        content='A common market for trucks, trailers, farm equipmemnt, machinery, spares and services.'>
@endif

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=611cf58549abbb00129cb353&product=sop' async='async'></script>