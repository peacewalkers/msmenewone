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
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('msmelist')); ?>/fonts/flaticon.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/css/market-place-2.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/css/custom.css">


    <?php echo $__env->yieldContent('headerscripts'); ?>
</head>


<body>

    
    <?php echo $__env->make('msme.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->yieldContent('content'); ?>

    
    <?php echo $__env->make('msme.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('msmefooters'); ?>
    <script src="<?php echo e(asset('msmelist')); ?>/plugins/jquery.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/nouislider/nouislider.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/popper.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/masonry.pkgd.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/isotope.pkgd.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/jquery.matchHeight-min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/slick/slick/slick.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/slick-animation.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/select2/dist/js/select2.full.min.js"></script>


<!-- custom scripts-->
<script src="<?php echo e(asset('msmelist')); ?>/js/main.js"></script>
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


<?php echo $__env->yieldContent('msmescripts'); ?>


</body>
</html>


<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/layouts/app.blade.php ENDPATH**/ ?>