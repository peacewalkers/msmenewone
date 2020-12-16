<?php $__env->startSection('styles'); ?>
    <!-- Image Crop Css -->
    <link href="<?php echo e(asset('backend/vendor/croppie/croppie.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.user.edit-profile')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.user.edit-profile-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-6">
                    <form method="POST" action="<?php echo e(route('user.profile.update')); ?>" class="">
                        <?php echo csrf_field(); ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="name" class="text-black"><?php echo e(__('backend.user.user-name')); ?></label>
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name') ? old('name') : $login_user->name); ?>" autofocus>
                                <?php $__errorArgs = ['name'];
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

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email"><?php echo e(__('backend.user.user-email')); ?></label>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email') ? old('email') : $login_user->email); ?>">
                                <?php $__errorArgs = ['email'];
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

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="user_about"><?php echo e(__('backend.user.user-about')); ?></label>
                                <textarea rows="4" id="user_about" class="form-control <?php $__errorArgs = ['user_about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_about"><?php echo e(old('user_about') ? old('user_about') : $login_user->user_about); ?></textarea>
                                <?php $__errorArgs = ['user_about'];
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

                        <div class="row form-group">

                            <div class="col-md-12">

                                <label class="text-black" for="user_prefer_language"><?php echo e(__('backend.setting.language.language')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['user_prefer_language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_prefer_language">
                                    <option value=""><?php echo e(__('backend.setting.language.select-language')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_AR); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_AR ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.arabic')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_CA); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_CA ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.catalan')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_DE); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_DE ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.german')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_EN); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_EN ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.english')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_ES); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_ES ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.spanish')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_FA); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_FA ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.persian-farsi')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_FR); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_FR ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.french')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_HI); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_HI ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.hindi')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_NL); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_NL ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.dutch')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_PT_BR); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_PT_BR ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.portuguese-brazil')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_RU); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_RU ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.russian')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_TR); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_TR ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.turkish')); ?></option>
                                    <option value="<?php echo e(\App\Setting::LANGUAGE_ZH_CN); ?>" <?php echo e($login_user->user_prefer_language == \App\Setting::LANGUAGE_ZH_CN ? 'selected' : ''); ?>><?php echo e(__('backend.setting.language.chinese')); ?></option>
                                </select>
                                <?php $__errorArgs = ['user_prefer_language'];
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

                        <div class="row form-group">

                            <div class="col-md-6">
                                <span class="text-lg text-gray-800"><?php echo e(__('backend.user.profile-image')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('backend.user.profile-image-help')); ?>

                                </small>
                                <?php $__errorArgs = ['user_image'];
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
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2"><?php echo e(__('backend.user.select-image')); ?></button>
                                        <?php if(empty($login_user->user_image)): ?>
                                            <img id="image_preview" src="<?php echo e(asset('frontend/images/placeholder/profile-' . intval($login_user->id % 10) . '.webp')); ?>" class="img-responsive">
                                        <?php else: ?>
                                            <img id="image_preview" src="<?php echo e(Storage::disk('public')->url('user/'. $login_user->user_image)); ?>" class="img-responsive">
                                        <?php endif; ?>
                                        <input id="feature_image" type="hidden" name="user_image">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr/>

                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('backend.shared.update')); ?>

                                </button>
                            </div>
                            <div class="col-4 text-right">
                                <a class="text-danger" href="<?php echo e(route('user.profile.password.edit')); ?>">
                                    <?php echo e(__('backend.user.change-password')); ?>

                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Croppie Modal -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.user.crop-profile-image')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="custom-file">
                                <input id="upload_image_input" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="upload_image_input"><?php echo e(__('backend.user.choose-image')); ?></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <button id="crop_image" type="button" class="btn btn-primary"><?php echo e(__('backend.user.crop-image')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <!-- Image Crop Plugin Js -->
    <script src="<?php echo e(asset('backend/vendor/croppie/croppie.js')); ?>"></script>

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            /**
             * Start the croppie image plugin
             */
            $image_crop = null;

            $('#upload_image').on('click', function(){

                $('#image-crop-modal').modal('show');
            });


            $('#upload_image_input').on('change', function(){

                if(!$image_crop)
                {
                    $image_crop = $('#image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:70,
                            height:70,
                            type:'square'
                        },
                        boundary:{
                            width:150,
                            height:150
                        }
                    });

                    $('#image-crop-modal .modal-dialog').css({
                        'max-width':'100%'
                    });
                }

                var reader = new FileReader();

                reader.onload = function (event) {

                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#crop_image').on("click", function(event){

                $image_crop.croppie('result', {
                    type: 'base64',
                    size: 'viewport'
                }).then(function(response){
                    $('#feature_image').val(response);
                    $('#image_preview').attr("src", response);
                });

                $('#image-crop-modal').modal('hide')
            });
            /**
             * End the croppie image plugin
             */

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/profile/edit.blade.php ENDPATH**/ ?>