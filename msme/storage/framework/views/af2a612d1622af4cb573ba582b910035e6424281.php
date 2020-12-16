<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    

    <?php echo SEO::generate(); ?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- favicon -->
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('msmelist')); ?>/fonts/flaticon.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/css/market-place-2.css">
    <link rel="stylesheet" href="<?php echo e(asset('msmelist')); ?>/css/custom.css">

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('backend/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('backend/css/msmebackend.css')); ?>" rel="stylesheet">

    <!-- Custom Style File -->
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/my-style-user.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">




<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        
        
        <?php echo $__env->make('backend.user.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Begin Page Content -->
            <div class="col-md-10 container-fluid backend bg-white" style="border-top: 1px solid grey">

                <?php echo $__env->make('backend.user.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    
    <?php echo $__env->make('backend.user.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- custom scripts-->

<script src="<?php echo e(asset('msmelist')); ?>/plugins/jquery.min.js"></script>

<script src="<?php echo e(asset('msmelist')); ?>/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo e(asset('msmelist')); ?>/plugins/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/masonry.pkgd.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/isotope.pkgd.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/jquery.matchHeight-min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="<?php echo e(asset('msmelist')); ?>/plugins/select2/dist/js/select2.full.min.js"></script>

<script src="<?php echo e(asset('msmelist')); ?>/js/main.js"></script>
<script src="<?php echo e(asset('frontend/vendor/pace/pace.min.js')); ?>"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('backend/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('backend/js/sb-admin-2.min.js')); ?>"></script>

<script>
    $(document).ready(function(){

        /**
         * The front-end form disable submit button UI
         */
        $("form").on("submit", function () {
            $("form :submit").attr("disabled", true);
            //$("form :submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            return true;
        });

    });

</script>

<?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>


<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/layouts/app.blade.php ENDPATH**/ ?>