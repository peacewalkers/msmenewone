<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>







    <div class="site-section bg-light pt-5 mt-5">
        <div class="container">
            <h3  class="text-center" ><?php echo e(__('auth.reset-password')); ?></h3>
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('password.email')); ?>" class="p-5 bg-white">
                        <?php echo csrf_field(); ?>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email"><?php echo e(__('auth.email-addr')); ?></label>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

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

                        <div class="row form-group text-center">
                            <div class="col-md-12">
                                <button type="submit"  class="ps-btn">
                                    <?php echo e(__('auth.send-password-reset-link')); ?>

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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>