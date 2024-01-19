<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_home']}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}">
    <meta name="twitter:description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_home']}}">
    <meta name="twitter:image" content="{{(isset($meta_thumbnail)) ? $meta_thumbnail : upload_url($setting['site_logo'])}}">

    <link rel="canonical" href="{{domain_url()}}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}" />
    <meta property="og:description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_home']}}" />
    <meta property="og:url" content="{{(isset($meta_url)) ? $meta_url : domain_url()}}" />
    <meta property="og:image" content="{{(isset($meta_thumbnail)) ? $meta_thumbnail : upload_url($setting['site_logo'])}}" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{upload_url($setting['site_logo'])}}">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/sal.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/feather.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/euclid-circulara.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/swiper.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/magnify.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/animation.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/magnigy-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/plugins/plyr.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/histudy/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">

</head>

<body class="rbt-header-sticky">

@include('frontend::layout.head')

@yield('content')

@include('frontend::layout.footer')

<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('frontend/histudy/assets/js/vendor/modernizr.min.js')}}"></script>
<!-- jQuery JS -->
<script src="{{asset('frontend/histudy/assets/js/vendor/jquery.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontend/histudy/assets/js/vendor/bootstrap.min.js')}}"></script>
<!-- sal.js -->
<script src="{{asset('frontend/histudy/assets/js/vendor/sal.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/swiper.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/magnify.min.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/jquery-appear.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/odometer.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/backtotop.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/isotop.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/imageloaded.js')}}"></script>

<script src="{{asset('frontend/histudy/assets/js/vendor/wow.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/waypoint.min.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/easypie.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/text-type.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/jquery-one-page-nav.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/magnify-popup.min.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/paralax-scroll.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/paralax.min.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/countdown.js')}}"></script>
<script src="{{asset('frontend/histudy/assets/js/vendor/plyr.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('frontend/histudy/assets/js/main.js')}}"></script>


<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

@yield("css")
@yield("js")
@yield("js-init")
@stack("js")
@stack("js-init")

</body>

</html>
