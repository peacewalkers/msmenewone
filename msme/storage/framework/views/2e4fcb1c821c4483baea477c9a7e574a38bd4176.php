<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('item_section.edit') . ': ' . $item_section->item_section_title); ?></h1>
            <p class="mb-4"><?php echo e(__('item_section.edit-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.items.sections.index', ['item' => $item])); ?>" class="btn btn-info btn-icon-split">
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
            <div class="row mb-5">
                <div class="col-3">
                    <?php if(empty($item->item_image)): ?>
                        <img id="image_preview" src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>" class="img-responsive rounded">
                    <?php else: ?>
                        <img id="image_preview" src="<?php echo e(Storage::disk('public')->url('item/'. $item->item_image)); ?>" class="img-responsive rounded">
                    <?php endif; ?>

                    <a target="_blank" href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="btn btn-primary btn-block mt-2"><?php echo e(__('backend.message.view-listing')); ?></a>

                </div>
                <div class="col-9">
                    <p>
                        <?php $__currentLoopData = $item->allCategories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="bg-info rounded text-white pl-2 pr-2 pt-1 pb-1 mr-1">
                                <?php echo e($category->category_name); ?>

                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <h1 class="h4 mb-2 text-gray-800"><?php echo e($item->item_title); ?></h1>

                    <?php if($item_has_claimed): ?>
                        <p>
                            <i class="fas fa-check-circle"></i>
                            <?php echo e(__('item_claim.item-claimed-by') . " " . $item_claimed_user->name); ?>

                        </p>
                    <?php else: ?>
                        <p>
                            <i class="fas fa-question-circle"></i>
                            <?php echo e(__('item_claim.unclaimed') . ", " . __('item_claim.item-posted-by') . " " . $item->user->name); ?>

                        </p>
                    <?php endif; ?>

                    <p><?php echo e($item->item_address_hide == 0 ? $item->item_address . ', ' : ''); ?> <?php echo e($item->city->city_name . ', ' . $item->state->state_name . ' ' . $item->item_postal_code); ?></p>
                    <hr/>
                    <p><?php echo e($item->item_description); ?></p>
                </div>
            </div>
            <hr>

            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.edit-section-cap')); ?></span>
                    |
                    <span class="text-gray-800"><?php echo e($item_section->item_section_title); ?></span>
                    |
                    <?php if($item_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                        <span class="bg-warning pl-1 pr-1 text-white text-sm rounded">
                            <?php echo e(__('item_section.item-section-status-draft')); ?>

                        </span>
                    <?php elseif($item_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                        <span class="bg-success pl-1 pr-1 text-white text-sm rounded">
                            <?php echo e(__('item_section.item-section-status-published')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="<?php echo e(route('admin.items.sections.update', ['item' => $item, 'item_section' => $item_section])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row form-group">
                            <div class="col-md-4 col-sm-12">
                                <label for="item_section_title" class="text-black"><?php echo e(__('item_section.item-section-title')); ?></label>
                                <input id="item_section_title" type="text" class="form-control <?php $__errorArgs = ['item_section_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_section_title" value="<?php echo e(old('item_section_title') ? old('item_section_title') : $item_section->item_section_title); ?>">
                                <?php $__errorArgs = ['item_section_title'];
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

                            <div class="col-md-4 col-sm-12">
                                <label for="item_section_position" class="text-black"><?php echo e(__('item_section.item-section-position')); ?></label>
                                <select class="custom-select" name="item_section_position">
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_BREADCRUMB); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_BREADCRUMB ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-breadcrumb')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_GALLERY); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_GALLERY ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-gallery')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_DESCRIPTION); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_DESCRIPTION ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-description')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_LOCATION_MAP); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_LOCATION_MAP ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-location-map')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_FEATURES); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_FEATURES ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-features')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_REVIEWS); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_REVIEWS ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-reviews')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_COMMENTS); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_COMMENTS ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-comments')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_SHARE); ?>" <?php echo e((old('item_section_position') ? old('item_section_position') : $item_section->item_section_position) == \App\ItemSection::POSITION_AFTER_SHARE ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-share')); ?></option>
                                </select>
                                <?php $__errorArgs = ['item_section_position'];
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

                            <div class="col-md-4 col-sm-12">
                                <label for="item_section_status" class="text-black"><?php echo e(__('item_section.item-section-status')); ?></label>
                                <select class="custom-select" name="item_section_status">
                                    <option value="<?php echo e(\App\ItemSection::STATUS_DRAFT); ?>" <?php echo e((old('item_section_status') ? old('item_section_status') : $item_section->item_section_status) == \App\ItemSection::STATUS_DRAFT ? 'selected' : ''); ?>><?php echo e(__('item_section.item-section-status-draft')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::STATUS_PUBLISHED); ?>" <?php echo e((old('item_section_status') ? old('item_section_status') : $item_section->item_section_status) == \App\ItemSection::STATUS_PUBLISHED ? 'selected' : ''); ?>><?php echo e(__('item_section.item-section-status-published')); ?></option>
                                </select>
                                <?php $__errorArgs = ['item_section_status'];
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

                        <div class="row form-group justify-content-between align-items-center">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('backend.shared.update')); ?>

                                </button>
                            </div>
                            <div class="col-4 text-right">
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <?php echo e(__('backend.shared.delete')); ?>

                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <hr>

            <!-- Start collections section -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.manage-collections')); ?></span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <a class="" href="#" data-toggle="modal" data-target="#addProductModal">
                        <i class="fas fa-plus"></i>
                        <?php echo e(__('item_section.add-products')); ?>

                    </a>
                </div>
            </div>

            <?php if($all_item_section_collections->count() > 0): ?>

                <?php $__currentLoopData = $all_item_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_item_section_collections_key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 border-left-info <?php echo e($all_item_section_collections_key%2 == 0 ? 'bg-light' : ''); ?>">

                        <?php if($collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>

                            <?php
                              $find_product = \App\Product::find($collection->item_section_collection_collectible_id);
                            ?>

                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <?php if(empty($find_product->product_image_small)): ?>
                                    <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                <?php else: ?>
                                    <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-12">
                                <span class="text-gray-800"><?php echo e($find_product->product_name); ?></span>
                                |
                                <span class="text-gray-800"><?php echo e($product_currency_symbol . $find_product->product_price); ?></span>
                                |
                                <?php if($find_product->product_status == \App\Product::STATUS_PENDING): ?>
                                    <span class="bg-warning pl-1 pr-1 text-white text-sm rounded">
                                        <?php echo e(__('products.product-status-pending')); ?>

                                    </span>
                                <?php elseif($find_product->product_status == \App\Product::STATUS_APPROVED): ?>
                                    <span class="bg-success pl-1 pr-1 text-white text-sm rounded">
                                        <?php echo e(__('products.product-status-approved')); ?>

                                    </span>
                                <?php elseif($find_product->product_status == \App\Product::STATUS_SUSPEND): ?>
                                    <span class="bg-danger pl-1 pr-1 text-white text-sm rounded">
                                        <?php echo e(__('products.product-status-suspend')); ?>

                                    </span>
                                <?php endif; ?>
                                |
                                <a target="_blank" class="ml-1" href="<?php echo e(route('admin.products.edit', ['product' => $collection->item_section_collection_collectible_id])); ?>">
                                    <i class="fas fa-edit"></i>
                                    <?php echo e(__('item_section.edit-section-link')); ?>

                                </a>
                                <br>
                                <span><?php echo e(str_limit($find_product->product_description, 100)); ?></span>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <form class="float-left pr-1" action="<?php echo e(route('admin.items.sections.collections.rank.up', ['item' => $item, 'item_section' => $item_section, 'item_section_collection' => $collection->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                </form>

                                <form class="float-left pr-1" action="<?php echo e(route('admin.items.sections.collections.rank.down', ['item' => $item, 'item_section' => $item_section, 'item_section_collection' => $collection->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-primary btn-sm text-white">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                </form>

                                <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_collection_delete_<?php echo e($collection->id); ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>

                            <!-- Modal - collection delete -->
                            <div class="modal fade" id="item_section_collection_delete_<?php echo e($collection->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_collection_delete_<?php echo e($collection->id); ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section-collection'), 'record_name' => $find_product->product_name])); ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                            <form action="<?php echo e(route('admin.items.sections.collections.destroy', ['item' => $item, 'item_section' => $item_section, 'item_section_collection' => $collection->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.section-no-collections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <hr>
            <!-- End collections section -->


        </div>
    </div>

    <!-- Modal -->
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
                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $item_section->item_section_title])); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.items.sections.destroy', ['item' => $item, 'item_section' => $item_section->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal add products -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('item_section.modal-add-attribute-title')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php if($available_products->count() > 0): ?>


                    <div class="modal-body">
                        <form action="<?php echo e(route('admin.items.sections.collections.store', ['item' => $item, 'item_section' => $item_section])); ?>" method="POST" id="add-product-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="item_section_collection_collectible_type" value="<?php echo e(\App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT); ?>">

                            <?php $__currentLoopData = $available_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $available_products_key => $available_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row align-items-center pt-2 mb-2 border-left-info <?php echo e($available_products_key%2 == 0 ? 'bg-light' : ''); ?>">
                                    <div class="col-1">
                                        <input type="checkbox" name="item_section_collection_collectible_id[]" class="form-control" value="<?php echo e($available_product->id); ?>">
                                    </div>
                                    <div class="col-3">
                                        <?php if(empty($available_product->product_image_small)): ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                        <?php else: ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $available_product->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-8">
                                        <span class="text-gray-800"><?php echo e($available_product->product_name); ?></span>
                                        |
                                        <span class="text-gray-800"><?php echo e($product_currency_symbol . $available_product->product_price); ?></span>
                                        |
                                        <?php if($available_product->product_status == \App\Product::STATUS_PENDING): ?>
                                            <span class="bg-warning pl-1 pr-1 text-white text-sm rounded">
                                                <?php echo e(__('products.product-status-pending')); ?>

                                            </span>
                                        <?php elseif($available_product->product_status == \App\Product::STATUS_APPROVED): ?>
                                            <span class="bg-success pl-1 pr-1 text-white text-sm rounded">
                                                <?php echo e(__('products.product-status-approved')); ?>

                                            </span>
                                        <?php elseif($available_product->product_status == \App\Product::STATUS_SUSPEND): ?>
                                            <span class="bg-danger pl-1 pr-1 text-white text-sm rounded">
                                                <?php echo e(__('products.product-status-suspend')); ?>

                                            </span>
                                        <?php endif; ?>
                                        <br>
                                        <span><?php echo e(str_limit($available_product->product_description, 30)); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php $__errorArgs = ['item_section_collection_collectible_id'];
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
                        <button type="button" class="btn btn-success" id="add-product-button"><?php echo e(__('item_section.modal-add-product-button')); ?></button>
                    </div>

                <?php else: ?>
                    <div class="modal-body">
                        <?php echo e(__('item_section.no-products')); ?>

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

    <script>
        $(document).ready(function() {

            /**
             * Start add product modal form submit
             */
            $('#add-product-button').on('click', function(){
                $('#add-product-button').attr("disabled", true);
                $('#add-product-form').submit();
            });
            <?php $__errorArgs = ['attribute'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#addProductModal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            /**
             * End add product modal form submit
             */

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/item/item-section/edit.blade.php ENDPATH**/ ?>