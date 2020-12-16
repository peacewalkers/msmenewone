
@extends('frontendok.layouts.app')
@section('msmescripts')
    <script src="plugins\nouislider\nouislider.min.js"></script>
    <script src="plugins\popper.min.js"></script>
    <script src="plugins\owl-carousel\owl.carousel.min.js"></script>
    <script src="plugins\bootstrap\js\bootstrap.min.js"></script>
    <script src="plugins\imagesloaded.pkgd.min.js"></script>
    <script src="plugins\masonry.pkgd.min.js"></script>
    <script src="plugins\isotope.pkgd.min.js"></script>
    <script src="plugins\jquery.matchHeight-min.js"></script>
    <script src="plugins\slick\slick\slick.min.js"></script>
    <script src="plugins\jquery-bar-rating\dist\jquery.barrating.min.js"></script>
    <script src="plugins\slick-animation.min.js"></script>
    <script src="plugins\lightGallery-master\dist\js\lightgallery-all.min.js"></script>
    <script src="plugins\sticky-sidebar\dist\sticky-sidebar.min.js"></script>
    <script src="plugins\select2\dist\js\select2.full.min.js"></script>
    <script src="plugins\gmap3.min.js"></script>
    <!-- custom scripts-->
    <script src="js\main.js"></script>
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

@endsection
