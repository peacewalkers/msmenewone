<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('item_section.index')); ?></h1>
            <p class="mb-4"><?php echo e(__('item_section.index-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('user.items.edit', ['item' => $item])); ?>" class="btn btn-info btn-icon-split">
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
                    <span class="text-gray-800"><?php echo e(__('item_section.add-item-section')); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="<?php echo e(route('user.items.sections.store', ['item' => $item])); ?>">
                        <?php echo csrf_field(); ?>

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
unset($__errorArgs, $__bag); ?>" name="item_section_title" value="<?php echo e(old('item_section_title')); ?>">
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
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_BREADCRUMB); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_BREADCRUMB ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-breadcrumb')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_GALLERY); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_GALLERY ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-gallery')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_DESCRIPTION); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_DESCRIPTION ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-description')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_LOCATION_MAP); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_LOCATION_MAP ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-location-map')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_FEATURES); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_FEATURES ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-features')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_REVIEWS); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_REVIEWS ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-reviews')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_COMMENTS); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_COMMENTS ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-comments')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::POSITION_AFTER_SHARE); ?>" <?php echo e(old('item_section_position') == \App\ItemSection::POSITION_AFTER_SHARE ? 'selected' : ''); ?>><?php echo e(__('item_section.position-after-share')); ?></option>
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
                                    <option value="<?php echo e(\App\ItemSection::STATUS_DRAFT); ?>" <?php echo e(old('item_section_status') == \App\ItemSection::STATUS_DRAFT ? 'selected' : ''); ?>><?php echo e(__('item_section.item-section-status-draft')); ?></option>
                                    <option value="<?php echo e(\App\ItemSection::STATUS_PUBLISHED); ?>" <?php echo e(old('item_section_status') == \App\ItemSection::STATUS_PUBLISHED ? 'selected' : ''); ?>><?php echo e(__('item_section.item-section-status-published')); ?></option>
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

                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('backend.shared.create')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <hr>

            <!-- Start after breadcrumb sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-breadcrumb')); ?></span>
                </div>
            </div>
            <?php if($item_sections_after_breadcrumb->count() > 0): ?>

                <?php $__currentLoopData = $item_sections_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_breadcrumb_key => $after_breadcrumb_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_sections_after_breadcrumb_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_breadcrumb_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_breadcrumb_section->item_section_title); ?></span>
                            |
                            <?php if($after_breadcrumb_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_breadcrumb_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_breadcrumb_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_breadcrumb_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_breadcrumb_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_breadcrumb_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_breadcrumb_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_breadcrumb_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_breadcrumb_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_breadcrumb_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_breadcrumb_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after breadcrumb sections -->

            <!-- Start after gallery sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-gallery')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_gallery->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_gallery_key => $after_gallery_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_gallery_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_gallery_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_gallery_section->item_section_title); ?></span>
                            |
                            <?php if($after_gallery_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_gallery_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_gallery_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_gallery_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_gallery_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_gallery_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_gallery_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_gallery_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_gallery_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_gallery_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_gallery_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after gallery sections -->


            <!-- Start after description sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-description')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_description->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_description_key => $after_description_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_description_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_description_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_description_section->item_section_title); ?></span>
                            |
                            <?php if($after_description_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_description_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_description_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_description_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_description_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_description_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_description_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_description_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_description_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_description_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_description_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after description sections -->


            <!-- Start after location map sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-location-map')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_location_map->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_location_map; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_location_map_key => $after_location_map_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_location_map_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_location_map_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_location_map_section->item_section_title); ?></span>
                            |
                            <?php if($after_location_map_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_location_map_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_location_map_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_location_map_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_location_map_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_location_map_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_location_map_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_location_map_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_location_map_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_location_map_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_location_map_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after location map sections -->


            <!-- Start after features sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-features')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_features->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_features_key => $after_features_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_features_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_features_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_features_section->item_section_title); ?></span>
                            |
                            <?php if($after_features_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_features_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_features_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_features_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_features_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_features_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_features_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_features_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_features_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_features_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_features_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after features sections -->


            <!-- Start after reviews sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-reviews')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_reviews->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_reviews_key => $after_reviews_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_reviews_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_reviews_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_reviews_section->item_section_title); ?></span>
                            |
                            <?php if($after_reviews_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_reviews_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_reviews_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_reviews_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_reviews_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_reviews_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_reviews_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_reviews_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_reviews_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_reviews_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_reviews_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after reviews sections -->


            <!-- Start after comments sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-comments')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_comments->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_comments_key => $after_comments_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_comments_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_comments_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_comments_section->item_section_title); ?></span>
                            |
                            <?php if($after_comments_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_comments_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_comments_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_comments_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_comments_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_comments_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_comments_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_comments_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_comments_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_comments_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_comments_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after comments sections -->

            <!-- Start after share sections -->
            <div class="row mb-2">
                <div class="col-12">
                    <span class="text-gray-800"><?php echo e(__('item_section.position-after-share')); ?></span>
                </div>
            </div>
            <?php if($item_section_after_share->count() > 0): ?>

                <?php $__currentLoopData = $item_section_after_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_section_after_share_key => $after_share_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row align-items-center pt-2 mb-2 <?php echo e($item_section_after_share_key%2 == 0 ? 'bg-light' : ''); ?> <?php echo e($after_share_section->item_section_status == \App\ItemSection::STATUS_DRAFT ? 'border-left-warning' : 'border-left-success'); ?>">
                        <div class="col-lg-8 col-md-7 col-sm-12">
                            <span class="text-gray-800"><?php echo e($after_share_section->item_section_title); ?></span>
                            |
                            <?php if($after_share_section->item_section_status == \App\ItemSection::STATUS_DRAFT): ?>
                                <span class="bg-warning pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-draft')); ?>

                                </span>
                            <?php elseif($after_share_section->item_section_status == \App\ItemSection::STATUS_PUBLISHED): ?>
                                <span class="bg-success pl-1 text-white text-sm rounded mr-1">
                                    <?php echo e(__('item_section.item-section-status-published')); ?>

                                </span>
                            <?php endif; ?>
                            |
                            <a class="ml-1" href="<?php echo e(route('user.items.sections.edit', ['item' => $item, 'item_section' => $after_share_section->id])); ?>">
                                <i class="fas fa-edit"></i>
                                <?php echo e(__('item_section.edit-section-link')); ?>

                            </a>
                            <ul>
                                <li>
                                    <?php echo e($after_share_section->itemSectionCollections()->count() . ' ' . __('item_section.collections')); ?>

                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12">
                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.up', ['item' => $item, 'item_section' => $after_share_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-up"></i>
                                </button>
                            </form>

                            <form class="float-left pr-1" action="<?php echo e(route('user.items.sections.rank.down', ['item' => $item, 'item_section' => $after_share_section->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-primary btn-sm text-white">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </form>

                            <a class="btn btn-danger btn-sm text-white" href="#" data-toggle="modal" data-target="#item_section_delete_<?php echo e($after_share_section->id); ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </div>
                    </div>

                    <!-- Modal - product feature delete -->
                    <div class="modal fade" id="item_section_delete_<?php echo e($after_share_section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="item_section_delete_<?php echo e($after_share_section->id); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('item_section.item-section'), 'record_name' => $after_share_section->item_section_title])); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                                    <form action="<?php echo e(route('user.items.sections.destroy', ['item' => $item, 'item_section' => $after_share_section->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-12">
                        <span><?php echo e(__('item_section.position-no-sections')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <hr>
            <!-- End after share sections -->


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/item/item-section/index.blade.php ENDPATH**/ ?>