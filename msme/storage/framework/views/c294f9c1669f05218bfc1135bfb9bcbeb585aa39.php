<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="test site-blocks-cover inner-page-cover overlay" style="margin: 250px 0px; text-align: center;" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center">
                            <h1><?php echo e(__('errors.404.title')); ?></h1>
                            <p><?php echo e(__('errors.404.description')); ?></p>
                            <a class="btn btn-warning text-white rounded" href="<?php echo e(url()->previous()); ?>"><?php echo e(__('errors.shared.go-back')); ?></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/errors/404.blade.php ENDPATH**/ ?>