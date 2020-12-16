<?php $__env->startSection('styles'); ?>
    <!-- Start Google reCAPTCHA version 2 -->
    <?php if($site_global_settings->setting_site_recaptcha_login_enable == \App\Setting::SITE_RECAPTCHA_LOGIN_ENABLE): ?>
    <?php endif; ?>
    <!-- End Google reCAPTCHA version 2 -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    


    <div class="site-section bg-light">
        <div class="">
            <div class="ps-page--my-account">
                <div class="ps-breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>

                <div class="ps-my-account">
                    <div class="container">
                        <div class="ps-form--account ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#sign-in">Login</a></li>
                                <li><a href="#register">Register</a></li>
                            </ul>

                            <div class="ps-tabs">
                                <div class="ps-tab active" id="sign-in">
                                    <div class="ps-form__content">

                                        <h5>Log In Your Account</h5>

                                        <?php echo $__env->make('backend.admin.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <form method="POST" action="<?php echo e(route('login')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <input id="email" type="text" placeholder="email address" class="form-control <?php $__errorArgs = ['email'];
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
                                            <div class="form-group form-forgot">
                                                <input id="password" type="password" placeholder="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required>
                                                <a href="<?php echo e(route('password.request')); ?>">Forgot?</a>
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
                                            <div class="form-group">
                                                <div class="ps-checkbox">
                                                    <input class="form-control" type="checkbox" id="remember" name="remember"  <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                    <label for="remember">Rememeber me</label>
                                                </div>
                                            </div>


                                            <!-- Start Google reCAPTCHA version 2 -->
                                            <?php if($site_global_settings->setting_site_recaptcha_login_enable == \App\Setting::SITE_RECAPTCHA_LOGIN_ENABLE): ?>
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <?php echo htmlFormSnippet(); ?>

                                                        <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-tooltip">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                        <?php endif; ?>
                                        <!-- End Google reCAPTCHA version 2 -->
                                            <div class="form-group submtit">
                                                <button class="ps-btn ps-btn--fullwidth">Login</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="ps-form__footer">
                                        <p>Connect with:</p>
                                        <ul class="ps-list--social">
                                            <li><a class="facebook" href="<?php echo e(route('auth.login.facebook')); ?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="google" href="<?php echo e(route('auth.login.google')); ?>"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="twitter" href="<?php echo e(route('auth.login.twitter')); ?>"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="ps-tab" id="register">
                                    <div class="ps-form__content">
                                        <h5>Register An Account</h5>
                                        <?php echo $__env->make('backend.admin.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <form method="POST" action="<?php echo e(route('register')); ?>" class="bg-white">
                                            <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required  autofocus placeholder="your name">
                                            <?php $__errorArgs = ['name'];
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

                                            <div class="form-group">
                                                <input id="phone" type="number" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('name')); ?>" required  autofocus placeholder="phone number">
                                                <?php $__errorArgs = ['phone'];
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

                                            <div class="form-group">
                                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required placeholder="email address">
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

                                        <div class="form-group">
                                            <input id="password" type="password" placeholder="choose password" class="form-control <?php $__errorArgs = ['password'];
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

                                            <div class="form-group">
                                                <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group submtit">
                                            <button class="ps-btn ps-btn--fullwidth">Register</button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="ps-form__footer">
                                        <p>Connect with:</p>
                                        <ul class="ps-list--social">
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/auth/account.blade.php ENDPATH**/ ?>