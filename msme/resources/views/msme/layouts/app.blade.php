<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MSMElist - </title>
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('msmelist')}}/fonts/flaticon.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/css/market-place-2.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/css/custom.css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">--}}

    @yield('headerscripts')
</head>


<body>

    {{-- nav bar --}}
    @include('msme.partials.nav')

    {{-- main content --}}
    @yield('content')

    {{-- footer --}}
    @include('msme.partials.footer')
    @yield('msmefooters')
    <script src="{{asset('msmelist')}}/plugins/jquery.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/nouislider/nouislider.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/popper.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/masonry.pkgd.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/isotope.pkgd.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/jquery.matchHeight-min.js"></script>
<script src="{{asset('msmelist')}}/plugins/slick/slick/slick.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/slick-animation.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/select2/dist/js/select2.full.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>--}}

<!-- custom scripts-->
<script src="{{asset('msmelist')}}/js/main.js"></script>
<script>
    $(".left-market .category-item, .category-layout").mouseenter(function() {
        $('.category-list').show();
        var i = $(this).index() + 1;
        $(".category-list span:nth-child(" + i + ")").show();
    });

    $(".left-market .category-item, .category-layout").mouseleave(function() {
        $('.category-list').hide();
        $(".category-list span").hide();
    });
</script>


@yield('msmescripts')


</body>
</html>


