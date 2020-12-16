<?php $__env->startSection('styles'); ?>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
    <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />
    <?php endif; ?>

    <!-- Image Crop Css -->
    <link href="<?php echo e(asset('backend/vendor/croppie/croppie.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap FD Css-->
    <link href="<?php echo e(asset('backend/vendor/bootstrap-fd/bootstrap.fd.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.item.add-item')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.item.add-item-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.items.index')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text"><?php echo e(__('backend.shared.back')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="row mb-2">
                        <div class="col-12">
                            <span class="text-lg text-gray-800"><?php echo e(__('backend.item.select-category')); ?></span>
                            <form class="form-inline" action="<?php echo e(route('admin.items.create')); ?>" method="GET">
                                <div class="form-group mr-2">
                                    <select multiple size="<?php echo e(count($all_categories)); ?>" class="custom-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category[]" onchange="$('#item-create-form').remove();">
                                        <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category['category_id']); ?>" <?php echo e(in_array($category['category_id'], empty($category_ids) ? array() : $category_ids) ? 'selected' : ''); ?>><?php echo e($category['category_name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category'];
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
                                <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('backend.item.load-form')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php if(is_array($category_ids) && count($category_ids) > 0): ?>
                    <form method="POST" action="<?php echo e(route('admin.items.store')); ?>" id="item-create-form">
                        <?php echo csrf_field(); ?>

                        <hr/>
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800"><?php echo e(__('backend.item.general-info')); ?></span>
                                <small class="form-text text-muted">
                                </small>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-4">
                                <label for="item_title" class="text-black"><?php echo e(__('backend.item.title')); ?></label>
                                <input id="item_title" type="text" class="form-control <?php $__errorArgs = ['item_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_title" value="<?php echo e(old('item_title')); ?>">
                                <?php $__errorArgs = ['item_title'];
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

                                <?php $__currentLoopData = $category_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input name="category[]" value="<?php echo e($category_id); ?>" type="hidden" class="input_category_id">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                            <div class="col-md-4">
                                <label for="item_status" class="text-black"><?php echo e(__('backend.item.status')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['item_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_status">

                                    <option value="<?php echo e(\App\Item::ITEM_SUBMITTED); ?>"><?php echo e(__('backend.item.submitted')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_PUBLISHED); ?>" selected><?php echo e(__('backend.item.published')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_SUSPENDED); ?>"><?php echo e(__('backend.item.suspended')); ?></option>

                                </select>
                                <?php $__errorArgs = ['item_status'];
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

                            <div class="col-md-4">
                                <label for="item_featured" class="text-black"><?php echo e(__('backend.item.featured')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['item_featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_featured">

                                    <option value="0" selected><?php echo e(__('backend.shared.no')); ?></option>
                                    <option value="<?php echo e(\App\Item::ITEM_FEATURED); ?>"><?php echo e(__('backend.shared.yes')); ?></option>

                                </select>
                                <?php $__errorArgs = ['item_featured'];
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

                        <div class="form-row mb-3">

                            <div class="col-md-3">
                                <label for="item_address" class="text-black"><?php echo e(__('backend.item.address')); ?></label>
                                <input id="item_address" type="text" class="form-control <?php $__errorArgs = ['item_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_address" value="<?php echo e(old('item_address')); ?>">
                                <?php $__errorArgs = ['item_address'];
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

                            <div class="col-md-3">
                                <label for="state_id" class="text-black"><?php echo e(__('backend.state.state')); ?></label>
                                <select id="select_state_id" class="custom-select <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="state_id">
                                    <option selected><?php echo e(__('backend.item.select-state')); ?></option>
                                    <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->id); ?>" <?php echo e($state->id == old('state_id') ? 'selected' : ''); ?>><?php echo e($state->state_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['state_id'];
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

                            <div class="col-md-3">
                                <label for="city_id" class="text-black"><?php echo e(__('backend.city.city')); ?></label>
                                <select id="select_city_id" class="custom-select <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city_id">
                                    <option selected><?php echo e(__('backend.item.select-city')); ?></option>
                                </select>
                                <?php $__errorArgs = ['city_id'];
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

                            <div class="col-md-3">
                                <label for="item_postal_code" class="text-black"><?php echo e(__('backend.item.postal-code')); ?></label>
                                <input id="item_postal_code" type="text" class="form-control <?php $__errorArgs = ['item_postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_postal_code" value="<?php echo e(old('item_postal_code')); ?>">
                                <?php $__errorArgs = ['item_postal_code'];
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

                        <div class="form-row mb-3">

                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input <?php echo e(old('item_address_hide') == 1 ? 'checked' : ''); ?> class="form-check-input" type="checkbox" id="item_address_hide" name="item_address_hide" value="1">
                                    <label class="form-check-label" for="item_address_hide">
                                        <?php echo e(__('backend.item.hide-address')); ?>

                                        <small class="text-muted">
                                            <?php echo e(__('backend.item.hide-address-help')); ?>

                                        </small>
                                    </label>
                                </div>
                                <?php $__errorArgs = ['item_address_hide'];
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

                        <div class="form-row mb-3">

                            <div class="col-md-3">
                                <label for="item_lat" class="text-black"><?php echo e(__('backend.item.lat')); ?></label>
                                <input id="item_lat" type="text" class="form-control <?php $__errorArgs = ['item_lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_lat" value="<?php echo e(old('item_lat')); ?>" aria-describedby="latHelpBlock">
                                <small id="latHelpBlock" class="form-text text-muted">
                                    <a class="lat_lng_select_button btn btn-sm btn-primary text-white"><?php echo e(__('backend.item.select-map')); ?></a>
                                </small>
                                <?php $__errorArgs = ['item_lat'];
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

                            <div class="col-md-3">
                                <label for="item_lng" class="text-black"><?php echo e(__('backend.item.lng')); ?></label>
                                <input id="item_lng" type="text" class="form-control <?php $__errorArgs = ['item_lng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_lng" value="<?php echo e(old('item_lng')); ?>" aria-describedby="lngHelpBlock">
                                <small id="lngHelpBlock" class="form-text text-muted">
                                    <a class="lat_lng_select_button btn btn-sm btn-primary text-white"><?php echo e(__('backend.item.select-map')); ?></a>
                                </small>
                                <?php $__errorArgs = ['item_lng'];
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

                            <div class="col-md-3">
                                <label for="item_phone" class="text-black"><?php echo e(__('backend.item.phone')); ?></label>
                                <input id="item_phone" type="text" class="form-control <?php $__errorArgs = ['item_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_phone" value="<?php echo e(old('item_phone')); ?>">
                                <?php $__errorArgs = ['item_phone'];
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

                            <div class="col-md-3">
                                <label for="item_youtube_id" class="text-black"><?php echo e(__('customization.item.youtube-id')); ?></label>
                                <input id="item_youtube_id" type="text" class="form-control <?php $__errorArgs = ['item_youtube_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_youtube_id" value="<?php echo e(old('item_youtube_id')); ?>">
                                <?php $__errorArgs = ['item_youtube_id'];
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

                        <div class="form-row mb-3">

                            <div class="col-md-12">
                                <label for="item_description" class="text-black"><?php echo e(__('backend.item.description')); ?></label>
                                <textarea class="form-control <?php $__errorArgs = ['item_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="item_description" rows="5" name="item_description"><?php echo e(old('item_description')); ?></textarea>
                                <?php $__errorArgs = ['item_description'];
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

                        <!-- Start web & social media -->
                        <div class="form-row mb-3">
                            <div class="col-md-3">
                                <label for="item_website" class="text-black"><?php echo e(__('backend.item.website')); ?></label>
                                <input id="item_website" type="text" class="form-control <?php $__errorArgs = ['item_website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_website" value="<?php echo e(old('item_website')); ?>">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    <?php echo e(__('backend.shared.url-help')); ?>

                                </small>
                                <?php $__errorArgs = ['item_website'];
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

                            <div class="col-md-3">
                                <label for="item_social_facebook" class="text-black"><?php echo e(__('backend.item.facebook')); ?></label>
                                <input id="item_social_facebook" type="text" class="form-control <?php $__errorArgs = ['item_social_facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_social_facebook" value="<?php echo e(old('item_social_facebook')); ?>">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    <?php echo e(__('backend.shared.url-help')); ?>

                                </small>
                                <?php $__errorArgs = ['item_social_facebook'];
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

                            <div class="col-md-3">
                                <label for="item_social_twitter" class="text-black"><?php echo e(__('backend.item.twitter')); ?></label>
                                <input id="item_social_twitter" type="text" class="form-control <?php $__errorArgs = ['item_social_twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_social_twitter" value="<?php echo e(old('item_social_twitter')); ?>">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    <?php echo e(__('backend.shared.url-help')); ?>

                                </small>
                                <?php $__errorArgs = ['item_social_twitter'];
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

                            <div class="col-md-3">
                                <label for="item_social_linkedin" class="text-black"><?php echo e(__('backend.item.linkedin')); ?></label>
                                <input id="item_social_linkedin" type="text" class="form-control <?php $__errorArgs = ['item_social_linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_social_linkedin" value="<?php echo e(old('item_social_linkedin')); ?>">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    <?php echo e(__('backend.shared.url-help')); ?>

                                </small>
                                <?php $__errorArgs = ['item_social_linkedin'];
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
                        <!-- End web & social media -->

                        <!-- Start custom field section -->
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800"><?php echo e(__('backend.item.custom-fields')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('backend.item.custom-field-help')); ?>

                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php $__currentLoopData = $all_customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mb-3">
                                    <?php if($customField->custom_field_type == \App\CustomField::TYPE_TEXT): ?>
                                        <label for="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" class="text-black"><?php echo e($customField->custom_field_name); ?></label>
                                        <textarea class="form-control <?php $__errorArgs = [str_slug($customField->custom_field_name . $customField->id)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" rows="5" name="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>"><?php echo e(old(str_slug($customField->custom_field_name . $customField->id))); ?></textarea>
                                        <?php $__errorArgs = [str_slug($customField->custom_field_name . $customField->id)];
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
                                    <?php endif; ?>
                                    <?php if($customField->custom_field_type == \App\CustomField::TYPE_SELECT): ?>
                                        <label for="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" class="text-black"><?php echo e($customField->custom_field_name); ?></label>
                                            <select class="custom-select" name="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" id="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>">
                                                <?php $__currentLoopData = explode(',', $customField->custom_field_seed_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $custom_field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($custom_field_value); ?>" <?php echo e(old(str_slug($customField->custom_field_name . $customField->id)) == $custom_field_value ? 'selected' : ''); ?>><?php echo e($custom_field_value); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <?php $__errorArgs = [str_slug($customField->custom_field_name . $customField->id)];
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
                                    <?php endif; ?>
                                    <?php if($customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT): ?>
                                        <label for="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" class="text-black"><?php echo e($customField->custom_field_name); ?></label>
                                        <select multiple class="custom-select" name="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>[]" id="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>">
                                            <?php $__currentLoopData = explode(',', $customField->custom_field_seed_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $custom_field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($custom_field_value); ?>" <?php echo e(old(str_slug($customField->custom_field_name . $customField->id)) == $custom_field_value ? 'selected' : ''); ?>><?php echo e($custom_field_value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = [$customField->custom_field_name . $customField->id];
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
                                    <?php endif; ?>
                                    <?php if($customField->custom_field_type == \App\CustomField::TYPE_LINK): ?>
                                        <label for="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" class="text-black"><?php echo e($customField->custom_field_name); ?></label>
                                        <input id="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" type="text" class="form-control <?php $__errorArgs = [str_slug($customField->custom_field_name . $customField->id)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="<?php echo e(str_slug($customField->custom_field_name . $customField->id)); ?>" value="<?php echo e(old(str_slug($customField->custom_field_name . $customField->id))); ?>" aria-describedby="linkHelpBlock">
                                        <small id="linkHelpBlock" class="form-text text-muted">
                                            <?php echo e(__('backend.shared.url-help')); ?>

                                        </small>
                                        <?php $__errorArgs = [str_slug($customField->custom_field_name . $customField->id)];
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
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- End custom field section -->

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <span class="text-lg text-gray-800"><?php echo e(__('backend.item.feature-image')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('backend.item.feature-image-help')); ?>

                                </small>
                                <?php $__errorArgs = ['feature_image'];
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
                                        <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2"><?php echo e(__('backend.item.select-image')); ?></button>
                                        <img id="image_preview" src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>" class="img-responsive">
                                        <input id="feature_image" type="hidden" name="feature_image">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <span class="text-lg text-gray-800"><?php echo e(__('backend.item.gallery-images')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('backend.item.gallery-images-help')); ?>

                                </small>
                                <?php $__errorArgs = ['image_gallery'];
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
                                    <div class="col-12">
                                        <button id="upload_gallery" type="button" class="btn btn-primary btn-block mb-2"><?php echo e(__('backend.item.select-images')); ?></button>
                                        <div class="row" id="selected-images">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    <?php echo e(__('backend.shared.create')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - feature image -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.item.crop-feature-image')); ?></h5>
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
                                <label class="custom-file-label" for="upload_image_input"><?php echo e(__('backend.item.choose-image')); ?></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <button id="crop_image" type="button" class="btn btn-primary"><?php echo e(__('backend.item.crop-image')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - map -->
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.item.select-map-title')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="map-modal-body"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span id="lat_lng_span"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <button id="lat_lng_confirm" type="button" class="btn btn-primary"><?php echo e(__('backend.shared.confirm')); ?></button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>
    <?php endif; ?>

    <!-- Image Crop Plugin Js -->
    <script src="<?php echo e(asset('backend/vendor/croppie/croppie.js')); ?>"></script>

    <!-- Bootstrap Fd Plugin Js-->
    <script src="<?php echo e(asset('backend/vendor/bootstrap-fd/bootstrap.fd.js')); ?>"></script>

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
            /**
             * Start map modal
             */
            var map = L.map('map-modal-body', {
                //center: [37.0902, -95.7129],
                center: [<?php echo e($setting_site_location_lat); ?>, <?php echo e($setting_site_location_lng); ?>],
                zoom: 5,
            });

            var layerGroup = L.layerGroup().addTo(map);
            var current_lat = 0;
            var current_lng = 0;

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.on('click', function(e) {

                // remove all the markers in one go
                layerGroup.clearLayers();
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(layerGroup);

                current_lat = e.latlng.lat;
                current_lng = e.latlng.lng;

                $('#lat_lng_span').text("Lat, Lng : " + e.latlng.lat + ", " + e.latlng.lng);
            });

            $('#lat_lng_confirm').on('click', function(){

                $('#item_lat').val(current_lat);
                $('#item_lng').val(current_lng);
                $('#map-modal').modal('hide')
            });
            $('.lat_lng_select_button').on('click', function(){
                $('#map-modal').modal('show');
                setTimeout(function(){ map.invalidateSize()}, 500);
            });
            /**
             * End map modal
             */
            <?php endif; ?>

            /**
             * Start state, city selector
             */
            $('#select_state_id').on('change', function() {

                $('#select_city_id').html('<option selected>Loading, please wait...</option>');

                if(this.value > 0)
                {
                    var ajax_url = '/ajax/cities/' + this.value;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: ajax_url,
                        method: 'get',
                        data: {
                        },
                        success: function(result){
                            console.log(result);
                            $('#select_city_id').html('<option selected>Select city</option>');
                            $.each(JSON.parse(result), function(key, value) {
                                var city_id = value.id;
                                var city_name = value.city_name;
                                $('#select_city_id').append('<option value="'+ city_id +'">' + city_name + '</option>');
                            });
                    }});
                }

            });
            /**
             * End state, city selector
             */

            /**
             * Start image gallery uplaod
             */
            $('#upload_gallery').on('click', function(){
                window.selectedImages = [];

                $.FileDialog({
                    accept: "image/jpeg",
                }).on("files.bs.filedialog", function (event) {
                    var html = "";
                    for (var a = 0; a < event.files.length; a++) {

                        if(a == 12) {break;}
                        selectedImages.push(event.files[a]);
                        html += "<div class='col-3 mb-2' id='item_image_gallery_" + a + "'>" +
                            "<img style='max-width: 120px;' src='" + event.files[a].content + "'>" +
                            "<br/><button class='btn btn-danger btn-sm text-white mt-1' onclick='$(\"#item_image_gallery_" + a + "\").remove();'>Delete</button>" +
                            "<input type='hidden' value='" + event.files[a].content + "' name='image_gallery[]'>" +
                            "</div>";
                    }
                    document.getElementById("selected-images").innerHTML += html;
                });
            });
            /**
             * End image gallery uplaod
             */

            /**
             * Start the croppie image plugin
             */
            $image_crop = null;

            $('#upload_image').on('click', function(){

                $('#image-crop-modal').modal('show');
            });

            var window_height = $(window).height();
            var window_width = $(window).width();
            var viewport_height = 0;
            var viewport_width = 0;

            if(window_width >= 800)
            {
                viewport_width = 800;
                viewport_height = 687;
            }
            else
            {
                viewport_width = window_width * 0.8;
                viewport_height = (viewport_width * 687) / 800;
            }

            $('#upload_image_input').on('change', function(){

                if(!$image_crop)
                {
                    $image_crop = $('#image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:viewport_width,
                            height:viewport_height,
                            type:'square',
                        },
                        boundary:{
                            width:viewport_width + 5,
                            height:viewport_width + 5,
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

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP): ?>

        <script>
            function initMap()
            {
                const myLatlng = { lat: <?php echo e($site_global_settings->setting_site_location_lat); ?>, lng: <?php echo e($site_global_settings->setting_site_location_lng); ?> };
                const map = new google.maps.Map(document.getElementById('map-modal-body'), {
                    zoom: 4,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                let infoWindow = new google.maps.InfoWindow({
                    content: "<?php echo e(__('google_map.select-lat-lng-on-map')); ?>",
                    position: myLatlng,
                });
                infoWindow.open(map);

                var current_lat = 0;
                var current_lng = 0;

                google.maps.event.addListener(map, 'click', function( event ){

                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        position: event.latLng,
                    });
                    infoWindow.setContent(
                        JSON.stringify(event.latLng.toJSON(), null, 2)
                    );
                    infoWindow.open(map);

                    current_lat = event.latLng.lat();
                    current_lng = event.latLng.lng();
                    console.log( "Latitude: "+current_lat+" "+", longitude: "+current_lng );
                    $('#lat_lng_span').text("Lat, Lng : " + current_lat + ", " + current_lng);
                });

                $('#lat_lng_confirm').on('click', function(){

                    $('#item_lat').val(current_lat);
                    $('#item_lng').val(current_lng);
                    $('#map-modal').modal('hide');
                });
                $('.lat_lng_select_button').on('click', function(){
                    $('#map-modal').modal('show');
                    //setTimeout(function(){ map.invalidateSize()}, 500);
                });
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key=<?php echo e($site_global_settings->setting_site_map_google_api_key); ?>&callback=initMap"></script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/item/create.blade.php ENDPATH**/ ?>