<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="site-section bg-light mt-5 pt-5">
        <h3 class="text-center"> Confirm your Email Address</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">

                    <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('auth.verify-email-sent')); ?>

                        </div>
                    <?php endif; ?>



                    <form method="POST" action="<?php echo e(route('verification.resend')); ?>" class="p-5 bg-white">
                        <?php echo csrf_field(); ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <?php echo e(__('auth.verify-email-check')); ?>

                                <?php echo e(__('auth.verify-email-not-receive')); ?>,
                            </div>
                        </div>
                        <div class="row form-group text-center">
                            <div class="col-md-12">
                                <button type="submit"   class="ps-btn"><?php echo e(__('auth.verify-email-request')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
    <!-- Youtube Background for Header -->
        <script src="<?php echo e(asset('frontend/vendor/jquery-youtube-background/jquery.youtube-background.js')); ?>"></script>
    <?php endif; ?>
    <script>


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/auth/verify.blade.php ENDPATH**/ ?>