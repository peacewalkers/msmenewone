<?php $__env->startSection('styles'); ?>
    <!-- Image Crop Css -->
    <link href="<?php echo e(asset('backend/vendor/croppie/croppie.css')); ?>" rel="stylesheet" />

    <!-- Bootstrap FD Css-->
    <link href="<?php echo e(asset('backend/vendor/bootstrap-fd/bootstrap.fd.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('products.edit')); ?></h1>
            <p class="mb-4"><?php echo e(__('products.edit-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-info btn-icon-split">
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

            <div class="row mb-3">
                <div class="col-12">
                    <?php if($product_owner->isUser()): ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo e(__('products.edit-owner-alert', ['user_name' => $product_owner->name, 'user_email' => $product_owner->email])); ?>

                            <a href="<?php echo e(route('admin.users.edit', ['user' => $product_owner->id])); ?>" class="alert-link" target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                                <?php echo e(__('products.edit-owner-alert-view-profile')); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <span class="text-lg text-gray-800"><?php echo e(__('products.product-status')); ?>: </span>
                    <?php if($product->product_status == \App\Product::STATUS_PENDING): ?>
                        <span class="text-warning"><?php echo e(__('products.product-status-pending')); ?></span>
                    <?php elseif($product->product_status == \App\Product::STATUS_APPROVED): ?>
                        <span class="text-success"><?php echo e(__('products.product-status-approved')); ?></span>
                    <?php elseif($product->product_status == \App\Product::STATUS_SUSPEND): ?>
                        <span class="text-danger"><?php echo e(__('products.product-status-suspend')); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">

                    <?php if($product->product_status == \App\Product::STATUS_PENDING): ?>
                        <form class="float-left pr-1" action="<?php echo e(route('admin.product.approve', ['product' => $product])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="far fa-check-circle"></i>
                                <?php echo e(__('backend.shared.approve')); ?>

                            </button>
                        </form>

                        <form class="float-left pr-1" action="<?php echo e(route('admin.product.suspend', ['product' => $product])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="far fa-flag"></i>
                                <?php echo e(__('backend.shared.suspend')); ?>

                            </button>
                        </form>
                    <?php endif; ?>

                    <?php if($product->product_status == \App\Product::STATUS_APPROVED): ?>
                        <form class="float-left pr-1" action="<?php echo e(route('admin.product.disapprove', ['product' => $product])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="far fa-times-circle"></i>
                                <?php echo e(__('backend.shared.disapprove')); ?>

                            </button>
                        </form>

                        <form class="float-left pr-1" action="<?php echo e(route('admin.product.suspend', ['product' => $product])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="far fa-flag"></i>
                                <?php echo e(__('backend.shared.suspend')); ?>

                            </button>
                        </form>
                    <?php endif; ?>

                    <?php if($product->product_status == \App\Product::STATUS_SUSPEND): ?>
                        <form class="float-left pr-1" action="<?php echo e(route('admin.product.approve', ['product' => $product])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="far fa-check-circle"></i>
                                <?php echo e(__('backend.shared.approve')); ?>

                            </button>
                        </form>

                        <form class="float-left pr-1" action="<?php echo e(route('admin.product.disapprove', ['product' => $product])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="far fa-times-circle"></i>
                                <?php echo e(__('backend.shared.disapprove')); ?>

                            </button>
                        </form>
                    <?php endif; ?>

                    <a class="btn btn-sm btn-outline-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt"></i>
                        <?php echo e(__('products.delete-product')); ?>

                    </a>

                    <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#addAttributeModal">
                        <i class="fas fa-plus"></i>
                        <?php echo e(__('products.add-attributes')); ?>

                    </a>

                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-xl-12 col-lg-12 col-sm-12">
                    <form method="POST" action="<?php echo e(route('admin.products.update', ['product' => $product])); ?>" class="">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="product_name" class="text-black"><?php echo e(__('products.form-product-name')); ?></label>
                                <input id="product_name" type="text" class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="product_name" value="<?php echo e(old('product_name') ? old('product_name') : $product->product_name); ?>">
                                <?php $__errorArgs = ['product_name'];
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
                                <label for="product_price" class="text-black"><?php echo e(__('products.form-product-price')); ?></label>
                                <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><?php echo e($setting_product_currency_symbol); ?></div>
                                </div>
                                <input id="product_price" type="text" class="form-control <?php $__errorArgs = ['product_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="product_price" value="<?php echo e(old('product_price') ? old('product_price') : $product->product_price); ?>">
                                </div>
                                <small id="product_priceHelpBlock" class="form-text text-muted">
                                    <?php echo e(__('products.form-product-price-help')); ?>

                                </small>
                                <?php $__errorArgs = ['product_price'];
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
                                <label for="product_status" class="text-black"><?php echo e(__('products.form-product-status')); ?></label>
                                <select class="custom-select" name="product_status">
                                    <option value="<?php echo e(\App\Product::STATUS_PENDING); ?>" <?php echo e((old('product_status') ? old('product_status') : $product->product_status) == \App\Product::STATUS_PENDING ? 'selected' : ''); ?>><?php echo e(__('products.product-status-pending')); ?></option>
                                    <option value="<?php echo e(\App\Product::STATUS_APPROVED); ?>" <?php echo e((old('product_status') ? old('product_status') : $product->product_status) == \App\Product::STATUS_APPROVED ? 'selected' : ''); ?>><?php echo e(__('products.product-status-approved')); ?></option>
                                    <option value="<?php echo e(\App\Product::STATUS_SUSPEND); ?>" <?php echo e((old('product_status') ? old('product_status') : $product->product_status) == \App\Product::STATUS_SUSPEND ? 'selected' : ''); ?>><?php echo e(__('products.product-status-suspend')); ?></option>
                                </select>
                                <?php $__errorArgs = ['product_status'];
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
                                <label for="product_description" class="text-black"><?php echo e(__('products.form-product-description')); ?></label>
                                <textarea class="form-control <?php $__errorArgs = ['product_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="product_description" rows="5" name="product_description"><?php echo e(old('product_description') ? old('product_description') : $product->product_description); ?></textarea>
                                <?php $__errorArgs = ['product_description'];
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
                                <span class="text-lg text-gray-800"><?php echo e(__('products.form-product-image')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('products.form-product-image-help')); ?>

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
                                        <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2"><?php echo e(__('products.form-product-image-select-image')); ?></button>
                                        <?php if(empty($product->product_image_medium)): ?>
                                            <img id="image_preview" src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>" class="img-responsive">
                                        <?php else: ?>
                                            <img id="image_preview" src="<?php echo e(Storage::disk('public')->url('product/'. $product->product_image_medium)); ?>" class="img-responsive">
                                        <?php endif; ?>
                                        <input id="feature_image" type="hidden" name="feature_image">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span class="text-lg text-gray-800"><?php echo e(__('products.form-product-gallery-images')); ?></span>
                                <small class="form-text text-muted">
                                    <?php echo e(__('products.form-product-gallery-images-help', ['gallery_photos_count' => $setting_product_max_gallery_photos])); ?>

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
                                        <button id="upload_gallery" type="button" class="btn btn-primary btn-block mb-2"><?php echo e(__('products.form-product-gallery-images-select-images')); ?></button>
                                        <div class="row" id="selected-images">
                                            <?php $__currentLoopData = $product->productGalleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-3 mb-2" id="item_image_gallery_<?php echo e($gallery->id); ?>">
                                                    <img class="item_image_gallery_img" src="<?php echo e(Storage::disk('public')->url('product/gallery/'. $gallery->product_image_gallery_thumb_name)); ?>">
                                                    <br/><button class="btn btn-danger btn-sm text-white mt-1" onclick="$(this).attr('disabled', true); deleteGallery(<?php echo e($gallery->id); ?>);"><?php echo e(__('backend.shared.delete')); ?></button>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row form-group mb-3">
                            <div class="col-md-12">
                                <span class="text-lg text-gray-800"><?php echo e(__('product_attributes.product-attribute')); ?></span>
                                <small class="form-text text-muted">
                                    <a class="" href="#" data-toggle="modal" data-target="#addAttributeModal">
                                        <i class="fas fa-plus"></i>
                                        <?php echo e(__('products.add-attributes')); ?>

                                    </a>
                                </small>
                            </div>
                        </div>

                        <?php $__currentLoopData = $product_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="row form-group align-items-center border-left-info <?php echo e($key%2 == 0 ? 'bg-light' : ''); ?> pt-3 pb-3">
                                <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">

                                    <?php if($product_feature->attribute->attribute_type == \App\Attribute::TYPE_TEXT): ?>
                                        <label for="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" class="text-black"><?php echo e($product_feature->attribute->attribute_name); ?></label>
                                        <textarea class="form-control <?php $__errorArgs = [str_slug('product_feature_' . $product_feature->id)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" rows="5" name="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>"><?php echo e(old(str_slug('product_feature_' . $product_feature->id)) ? old(str_slug('product_feature_' . $product_feature->id)) : $product_feature->product_feature_value); ?></textarea>
                                        <?php $__errorArgs = [str_slug('product_feature_' . $product_feature->id)];
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

                                    <?php if($product_feature->attribute->attribute_type == \App\Attribute::TYPE_SELECT): ?>
                                        <label for="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" class="text-black"><?php echo e($product_feature->attribute->attribute_name); ?></label>
                                        <select class="custom-select" name="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" id="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>">
                                            <?php $__currentLoopData = explode(',', $product_feature->attribute->attribute_seed_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($product_feature->product_feature_value == trim($attribute_value) ? 'selected' : ''); ?> value="<?php echo e($attribute_value); ?>"><?php echo e($attribute_value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = [str_slug('product_feature_' . $product_feature->id)];
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

                                    <?php if($product_feature->attribute->attribute_type == \App\Attribute::TYPE_MULTI_SELECT): ?>
                                        <label for="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" class="text-black"><?php echo e($product_feature->attribute->attribute_name); ?></label>
                                        <select multiple class="custom-select" name="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>[]" id="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>">
                                            <?php $__currentLoopData = explode(',', $product_feature->attribute->attribute_seed_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(( ($product_feature->product_feature_value == trim($attribute_value) ? true : false) || (strpos($product_feature->product_feature_value, trim($attribute_value) . ',') === 0 ? true : false) || (strpos($product_feature->product_feature_value, ', ' . trim($attribute_value) . ',') !== false ? true : false) || (strpos($product_feature->product_feature_value, ',' . trim($attribute_value) . ',') !== false ? true : false) || (strpos($product_feature->product_feature_value, ', ' . trim($attribute_value) ) !== false ? true : false) || (strpos($product_feature->product_feature_value, ',' . trim($attribute_value) ) !== false ? true : false) ) == true ? 'selected' : ''); ?> value="<?php echo e($attribute_value); ?>"><?php echo e($attribute_value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = [str_slug('product_feature_' . $product_feature->id)];
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

                                    <?php if($product_feature->attribute->attribute_type == \App\Attribute::TYPE_LINK): ?>
                                        <label for="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" class="text-black"><?php echo e($product_feature->attribute->attribute_name); ?></label>
                                        <input id="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" type="text" class="form-control <?php $__errorArgs = [str_slug('product_feature_' . $product_feature->id)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="<?php echo e(str_slug('product_feature_' . $product_feature->id)); ?>" value="<?php echo e(old(str_slug('product_feature_' . $product_feature->id)) ? old(str_slug('product_feature_' . $product_feature->id)) : $product_feature->product_feature_value); ?>" aria-describedby="linkHelpBlock">
                                        <small id="linkHelpBlock" class="form-text text-muted">
                                            <?php echo e(__('backend.shared.url-help')); ?>

                                        </small>
                                        <?php $__errorArgs = [str_slug('product_feature_' . $product_feature->id)];
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

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 pt-2">

                                    <a onclick="$('#form_feature_rank_up_<?php echo e($product_feature->id); ?>').submit();" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-arrow-up"></i>
                                    </a>

                                    <a onclick="$('#form_feature_rank_down_<?php echo e($product_feature->id); ?>').submit();" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-arrow-down"></i>
                                    </a>

                                    <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#form_feature_delete_<?php echo e($product_feature->id); ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <hr>
                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('backend.shared.update')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Start forms for product features -->
    <?php $__currentLoopData = $product_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <form id="form_feature_rank_up_<?php echo e($product_feature->id); ?>" action="<?php echo e(route('admin.product.feature.up', ['product' => $product->id, 'product_feature' => $product_feature->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
        </form>

        <form id="form_feature_rank_down_<?php echo e($product_feature->id); ?>" action="<?php echo e(route('admin.product.feature.down', ['product' => $product->id, 'product_feature' => $product_feature->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
        </form>

        <!-- Modal - product feature delete -->
        <div class="modal fade" id="form_feature_delete_<?php echo e($product_feature->id); ?>" tabindex="-1" role="dialog" aria-labelledby="form_feature_delete_<?php echo e($product_feature->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo e(__('backend.shared.delete-message', ['record_type' => __('products.product-feature'), 'record_name' => $product_feature->attribute()->first()->attribute_name])); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                        <form action="<?php echo e(route('admin.product.feature.destroy', ['product' => $product->id, 'product_feature' => $product_feature->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- End forms for product features -->



    <!-- Modal - feature image -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('products.crop-feature-image')); ?></h5>
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
                                <label class="custom-file-label" for="upload_image_input"><?php echo e(__('products.choose-image')); ?></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <button id="crop_image" type="button" class="btn btn-primary"><?php echo e(__('products.crop-image')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('products.product'), 'record_name' => $product->product_name])); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.products.destroy', ['product' => $product->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add attributes -->
    <div class="modal fade" id="addAttributeModal" tabindex="-1" role="dialog" aria-labelledby="addAttributeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('products.modal-add-attribute-title')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if($attributes->count() > 0): ?>


                        <div class="modal-body">
                            <form action="<?php echo e(route('admin.product.attribute.update', ['product' => $product])); ?>" method="POST" id="add-product-attribute-form">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <select multiple size="<?php echo e($attributes->count() + 5); ?>" class="custom-select" name="attribute[]" id="attribute">
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($attribute->id); ?>">
                                        <?php echo e($attribute->attribute_name . ' / '); ?>


                                        <?php if($attribute->attribute_type == \App\Attribute::TYPE_TEXT): ?>
                                            <?php echo e(__('product_attributes.type-text')); ?>

                                        <?php elseif($attribute->attribute_type == \App\Attribute::TYPE_SELECT): ?>
                                            <?php echo e(__('product_attributes.type-select')); ?>

                                        <?php elseif($attribute->attribute_type == \App\Attribute::TYPE_MULTI_SELECT): ?>
                                            <?php echo e(__('product_attributes.type-multi-select')); ?>

                                        <?php elseif($attribute->attribute_type == \App\Attribute::TYPE_LINK): ?>
                                            <?php echo e(__('product_attributes.type-link')); ?>

                                        <?php endif; ?>

                                        <?php if($attribute->attribute_type == \App\Attribute::TYPE_SELECT || $attribute->attribute_type == \App\Attribute::TYPE_MULTI_SELECT): ?>
                                            <?php echo e(' / ' . $attribute->attribute_seed_value); ?>

                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['attribute'];
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
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                            <button type="button" class="btn btn-success" id="add-product-attribute-button"><?php echo e(__('products.modal-add-attribute-button')); ?></button>
                        </div>

                <?php else: ?>
                    <div class="modal-body">
                        <?php echo e(__('products.no-attributes')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Image Crop Plugin Js -->
    <script src="<?php echo e(asset('backend/vendor/croppie/croppie.js')); ?>"></script>

    <!-- Bootstrap Fd Plugin Js-->
    <script src="<?php echo e(asset('backend/vendor/bootstrap-fd/bootstrap.fd.js')); ?>"></script>

    <script>

        function deleteGallery(domId)
        {
            //$("form :submit").attr("disabled", true);

            var ajax_url = '/ajax/product/gallery/delete/' + domId;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: ajax_url,
                method: 'post',
                data: {
                },
                success: function(result){
                    console.log(result);
                    $('#item_image_gallery_' + domId).remove();
                }});
        }

        $(document).ready(function() {

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
                viewport_width = 455;
                viewport_height = 390;
            }
            else
            {
                viewport_width = window_width * 0.8;
                viewport_height = (viewport_width * 390) / 455;
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
             * Start add product attribute modal form submit
             */
            $('#add-product-attribute-button').on('click', function(){
                $('#add-product-attribute-button').attr("disabled", true);
                $('#add-product-attribute-form').submit();
            });
            <?php $__errorArgs = ['attribute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#addAttributeModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            /**
             * End add product attribute modal form submit
             */

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/product/edit.blade.php ENDPATH**/ ?>