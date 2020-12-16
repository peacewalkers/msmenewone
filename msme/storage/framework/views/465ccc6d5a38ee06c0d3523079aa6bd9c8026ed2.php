<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="site-section bg-light mt-5 pt-5 ">
        <h3 class="text-center"> Enter New Password </h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 mb-5"  data-aos="fade">

                    <form method="POST" action="<?php echo e(route('password.update')); ?>" class="p-5 bg-white">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email"><?php echo e(__('auth.email-addr')); ?></label>
                                <input id="email"    type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>


                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="password"><?php echo e(__('auth.password')); ?></label>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="password-confirm"><?php echo e(__('auth.confirm-password')); ?></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="row form-group text-center">
                            <div class="col-md-12">
                                <button type="submit"  class="ps-btn">
                                    <?php echo e(__('auth.reset-password')); ?>

                                </button>
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

        $(document).ready(function(){

            <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            <?php endif; ?>

        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>