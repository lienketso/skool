<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Triki là một phần cộng đồng, một phần kinh doanh, một phần học tập. Giúp bạn học tập được nhiều hơn, cùng đăng nhập và trải nghiệm">
    <meta name="author" content="">
    <meta name="generator" content="Lienketso">
    <title>{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}</title>

    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/fontawesome-pro-5/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/bootstrap-select/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/slick/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/magnific-popup/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendors/mapbox-gl/mapbox-gl.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/bootstrap-4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">

    <link rel="icon" href="{{upload_url($setting['site_logo'])}}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}">
    <meta name="twitter:description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}">
    <meta name="twitter:image" content="{{(isset($meta_thumbnail)) ? $meta_thumbnail : upload_url($setting['site_logo'])}}">

    <meta name="description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}" />
    <link rel="canonical" href="{{domain_url()}}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}" />
    <meta property="og:description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}" />
    <meta property="og:url" content="{{(isset($meta_url)) ? $meta_url : domain_url()}}" />
    <meta property="og:image" content="{{(isset($meta_thumbnail)) ? $meta_thumbnail : upload_url($setting['site_logo'])}}" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
</head>
<body>



<main id="content">
    @yield('content')
</main>
@include('frontend::footer')

<script src="{{asset('frontend/assets/vendors/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/slick/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/counter/countUp.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/hc-sticky/hc-sticky.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/jparallax/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/assets/vendors/mapbox-gl/mapbox-gl.js')}}"></script>

<script src="{{asset('frontend/assets/js/theme.js')}}"></script>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

<script type="text/javascript">
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("headerFix");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>

@yield("css")
@yield("js")
@yield("js-init")
@stack("js")
@stack("js-init")

</body>
</html>
