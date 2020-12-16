<?php $__env->startSection('styles'); ?>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
    <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('frontend/vendor/justified-gallery/justifiedGallery.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/vendor/colorbox/colorbox.css')); ?>" type="text/css">

    <link rel="stylesheet" href="<?php echo e(asset('backend/vendor/jquery-bar-rating/dist/themes/bootstrap-stars.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Display on xl -->
    <?php if(!empty($item->item_image) && !empty($item->item_image_blur)): ?>
        <div class="site-blocks-cover inner-page-cover overlay d-none d-xl-flex" style="background-image: url(<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_blur)); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php else: ?>
        <div class="site-blocks-cover inner-page-cover overlay d-none d-xl-flex" style="background-image: url(<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php endif; ?>
        <div class="container">
            <div class="row align-items-center item-blocks-cover">

                <div class="col-lg-2 col-md-2" data-aos="fade-up" data-aos-delay="400">
                    <?php if(!empty($item->item_image_tiny)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_tiny)); ?>" alt="Image" class="img-fluid rounded">
                    <?php elseif(!empty($item->item_image)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                    <?php else: ?>
                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                    <?php endif; ?>
                </div>
                <div class="col-lg-7 col-md-5" data-aos="fade-up" data-aos-delay="400">

                    <h1 class="item-cover-title-section"><?php echo e($item->item_title); ?></h1>

                    <?php if($item_has_claimed): ?>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <span class="text-primary">
                                <i class="fas fa-check-circle"></i>
                                <?php echo e(__('item_claim.claimed')); ?>

                            </span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($item_count_rating > 0): ?>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="rating_stars_header"></div>
                        </div>
                        <div class="col-md-9 pl-0">
                            <span class="item-cover-address-section">
                                <?php if($item_count_rating == 1): ?>
                                    <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.review') . ')'); ?>

                                <?php else: ?>
                                    <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.reviews') . ')'); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php $__currentLoopData = $item_display_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $item_category->category_slug)); ?>">
                        <span class="category"><?php echo e($item_category->category_name); ?></span>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
                        <a class="text-primary" href="#" data-toggle="modal" data-target="#showCategoriesModal">
                            <?php echo e(__('categories.and') . " " . strval($item_total_categories - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " ". __('categories.more')); ?>

                            <i class="far fa-window-restore text-primary"></i>
                        </a>
                    <?php endif; ?>

                    <p class="item-cover-address-section">
                        <?php if($item->item_address_hide == 0): ?>
                            <?php echo e($item->item_address); ?> <br>
                        <?php endif; ?>
                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                    </p>

                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                    <?php else: ?>

                        <?php if($item->user_id != Auth::user()->id): ?>

                            <?php if(Auth::user()->isAdmin()): ?>
                                <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                <?php endif; ?>

                            <?php else: ?>
                                <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                <?php endif; ?>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php endif; ?>
                    <a class="btn btn-primary rounded text-white item-share-button"><i class="fas fa-share-alt"></i> <?php echo e(__('frontend.item.share')); ?></a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary rounded text-white" id="item-save-button-xl"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                        <form id="item-save-form-xl" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                            <a class="btn btn-warning rounded text-white" id="item-saved-button-xl"><i class="fas fa-check"></i> <?php echo e(__('frontend.item.saved')); ?></a>
                            <form id="item-unsave-form-xl" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <a class="btn btn-primary rounded text-white" id="item-save-button-xl"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                            <form id="item-save-form-xl" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a class="btn btn-primary rounded text-white" href="tel:<?php echo e($item->item_phone); ?>"><i class="fas fa-phone-alt"></i> <?php echo e(__('frontend.item.call')); ?></a>

                </div>
                <div class="col-lg-3 col-md-5 pl-0 pr-0 item-cover-contact-section" data-aos="fade-up" data-aos-delay="400">
                    <?php if(!empty($item->item_phone)): ?>
                        <h3><i class="fas fa-phone-alt"></i> <?php echo e($item->item_phone); ?></h3>
                    <?php endif; ?>
                    <p>
                        <?php if(!empty($item->item_website)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_website); ?>" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_facebook)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_facebook); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_twitter)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_twitter); ?>" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_linkedin)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_linkedin); ?>" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Display on lg, md -->
    <?php if(!empty($item->item_image) && !empty($item->item_image_blur)): ?>
        <div class="site-blocks-cover inner-page-cover overlay d-none d-md-flex d-lg-flex d-xl-none" style="background-image: url(<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_blur)); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php else: ?>
        <div class="site-blocks-cover inner-page-cover overlay d-none d-md-flex d-lg-flex d-xl-none" style="background-image: url(<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php endif; ?>
        <div class="container">
            <div class="row align-items-center item-blocks-cover">
                <div class="col-lg-2 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <?php if(!empty($item->item_image_tiny)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_tiny)); ?>" alt="Image" class="img-fluid rounded">
                    <?php elseif(!empty($item->item_image)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                    <?php else: ?>
                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                    <?php endif; ?>
                </div>
                <div class="col-lg-7 col-md-9" data-aos="fade-up" data-aos-delay="400">

                    <h1 class="item-cover-title-section"><?php echo e($item->item_title); ?></h1>

                    <?php if($item_has_claimed): ?>
                        <div class="row mb-2">
                            <div class="col-md-12">
                            <span class="text-primary">
                                <i class="fas fa-check-circle"></i>
                                <?php echo e(__('item_claim.claimed')); ?>

                            </span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($item_count_rating > 0): ?>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="rating_stars_header"></div>
                            </div>
                            <div class="col-md-8 pl-0">
                                <span class="item-cover-address-section">
                                    <?php if($item_count_rating == 1): ?>
                                        <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.review') . ')'); ?>

                                    <?php else: ?>
                                        <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.reviews') . ')'); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $__currentLoopData = $item_display_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $item_category->category_slug)); ?>">
                            <span class="category"><?php echo e($item_category->category_name); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
                        <a class="text-primary" href="#" data-toggle="modal" data-target="#showCategoriesModal">
                            <?php echo e(__('categories.and') . " " . strval($item_total_categories - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " ". __('categories.more')); ?>

                            <i class="far fa-window-restore text-primary"></i>
                        </a>
                    <?php endif; ?>

                    <p class="item-cover-address-section">
                        <?php if($item->item_address_hide == 0): ?>
                            <?php echo e($item->item_address); ?> <br>
                        <?php endif; ?>
                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                    </p>

                    <?php if(!empty($item->item_phone)): ?>
                        <p class="item-cover-address-section"><i class="fas fa-phone-alt"></i> <?php echo e($item->item_phone); ?></p>
                    <?php endif; ?>
                    <p class="item-cover-address-section">
                        <?php if(!empty($item->item_website)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_website); ?>" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_facebook)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_facebook); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_twitter)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_twitter); ?>" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_linkedin)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_linkedin); ?>" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                    </p>

                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                    <?php else: ?>

                        <?php if($item->user_id != Auth::user()->id): ?>

                            <?php if(Auth::user()->isAdmin()): ?>
                                <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                <?php endif; ?>

                            <?php else: ?>
                                <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                <?php endif; ?>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php endif; ?>
                    <a class="btn btn-primary rounded text-white item-share-button"><i class="fas fa-share-alt"></i> <?php echo e(__('frontend.item.share')); ?></a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary rounded text-white" id="item-save-button-md"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                        <form id="item-save-form-md" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                            <a class="btn btn-warning rounded text-white" id="item-saved-button-md"><i class="fas fa-check"></i> <?php echo e(__('frontend.item.saved')); ?></a>
                            <form id="item-unsave-form-md" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <a class="btn btn-primary rounded text-white" id="item-save-button-md"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                            <form id="item-save-form-md" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                    <a class="btn btn-primary rounded text-white" href="tel:<?php echo e($item->item_phone); ?>"><i class="fas fa-phone-alt"></i> <?php echo e(__('frontend.item.call')); ?></a>

                </div>
            </div>
        </div>
    </div>

    <!-- Display on sm and xs -->
    <?php if(!empty($item->item_image) && !empty($item->item_image_blur)): ?>
        <div class="site-blocks-cover site-blocks-cover-sm inner-page-cover overlay d-md-none" style="background-image: url(<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_blur)); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php else: ?>
        <div class="site-blocks-cover site-blocks-cover-sm inner-page-cover overlay d-md-none" style="background-image: url(<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php endif; ?>
        <div class="container">
            <div class="row align-items-center item-blocks-cover-sm">
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">

                    <h1 class="item-cover-title-section item-cover-title-section-sm-xs"><?php echo e($item->item_title); ?></h1>

                    <?php if($item_has_claimed): ?>
                        <div class="row mb-2">
                            <div class="col-md-12">
                            <span class="text-primary">
                                <i class="fas fa-check-circle"></i>
                                <?php echo e(__('item_claim.claimed')); ?>

                            </span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($item_count_rating > 0): ?>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="rating_stars_header"></div>
                            </div>
                            <div class="col-6 pl-0">
                                <span class="item-cover-address-section item-cover-address-section-sm-xs">
                                    <?php if($item_count_rating == 1): ?>
                                        <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.review') . ')'); ?>

                                    <?php else: ?>
                                        <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.reviews') . ')'); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $__currentLoopData = $item_display_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $item_category->category_slug)); ?>">
                            <span class="category"><?php echo e($item_category->category_name); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
                        <a class="text-primary" href="#" data-toggle="modal" data-target="#showCategoriesModal">
                            <?php echo e(__('categories.and') . " " . strval($item_total_categories - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " ". __('categories.more')); ?>

                            <i class="far fa-window-restore text-primary"></i>
                        </a>
                    <?php endif; ?>

                    <p class="item-cover-address-section item-cover-address-section-sm-xs">
                        <?php if($item->item_address_hide == 0): ?>
                            <?php echo e($item->item_address); ?> <br>
                        <?php endif; ?>
                        <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                    </p>

                    <?php if(!empty($item->item_phone)): ?>
                        <p class="item-cover-address-section item-cover-address-section-sm-xs">
                            <i class="fas fa-phone-alt"></i> <?php echo e($item->item_phone); ?>

                            <a class="btn btn-outline-primary btn-sm rounded" href="tel:<?php echo e($item->item_phone); ?>"><?php echo e(__('frontend.item.call')); ?></a>
                        </p>
                    <?php endif; ?>
                    <p class="item-cover-address-section item-cover-address-section-sm-xs">
                        <?php if(!empty($item->item_website)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_website); ?>" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_facebook)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_facebook); ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_twitter)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_twitter); ?>" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($item->item_social_linkedin)): ?>
                            <a class="mr-1" href="<?php echo e($item->item_social_linkedin); ?>" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                    </p>

                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary btn-sm rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                    <?php else: ?>

                        <?php if($item->user_id != Auth::user()->id): ?>

                            <?php if(Auth::user()->isAdmin()): ?>
                                <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                    <a class="btn btn-primary btn-sm rounded text-white" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-primary btn-sm rounded text-white" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                <?php endif; ?>

                            <?php else: ?>
                                <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                    <a class="btn btn-primary btn-sm rounded text-white" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                <?php else: ?>
                                    <a class="btn btn-primary btn-sm rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                <?php endif; ?>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php endif; ?>
                    <a class="btn btn-primary btn-sm rounded text-white item-share-button"><i class="fas fa-share-alt"></i> <?php echo e(__('frontend.item.share')); ?></a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="btn btn-primary btn-sm rounded text-white" id="item-save-button-sm"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                        <form id="item-save-form-sm" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                            <?php echo csrf_field(); ?>
                        </form>
                    <?php else: ?>
                        <?php if(Auth::user()->hasSavedItem($item->id)): ?>
                            <a class="btn btn-warning btn-sm rounded text-white" id="item-saved-button-sm"><i class="fas fa-check"></i> <?php echo e(__('frontend.item.saved')); ?></a>
                            <form id="item-unsave-form-sm" action="<?php echo e(route('page.item.unsave', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <a class="btn btn-primary btn-sm rounded text-white" id="item-save-button-sm"><i class="far fa-bookmark"></i> <?php echo e(__('frontend.item.save')); ?></a>
                            <form id="item-save-form-sm" action="<?php echo e(route('page.item.save', ['item_slug' => $item->item_slug])); ?>" method="POST" hidden="true">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <?php echo $__env->make('backend.admin.partials.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($ads_before_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_before_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_breadcrumb_key => $ad_before_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                        <?php if($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                            <div class="col-12 text-left">
                                <div>
                                    <?php echo $ad_before_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                            <div class="col-12 text-center">
                                <div>
                                    <?php echo $ad_before_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                            <div class="col-12 text-right">
                                <div>
                                    <?php echo $ad_before_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="row mb-3">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.home')); ?>"><?php echo e(__('frontend.header.home')); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.item.all-categories')); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($item->item_title); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php if($ads_after_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_breadcrumb_key => $ad_after_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-3">
                        <?php if($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                            <div class="col-12 text-left">
                                <div>
                                    <?php echo $ad_after_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                            <div class="col-12 text-center">
                                <div>
                                    <?php echo $ad_after_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                            <div class="col-12 text-right">
                                <div>
                                    <?php echo $ad_after_breadcrumb->advertisement_code; ?>

                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-8">

                    <?php if(Auth::check() && Auth::user()->id == $item->user_id): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="alert alert-warning }} alert-dismissible fade show" role="alert">
                                    <?php echo e(__('products.alert.this-is-your-item')); ?>

                                    <?php if(Auth::user()->isAdmin()): ?>
                                        <a class="pl-1" target="_blank" href="<?php echo e(route('admin.items.edit', $item->id)); ?>">
                                            <i class="fas fa-external-link-alt"></i>
                                            <?php echo e(__('products.edit-item-link')); ?>

                                        </a>
                                    <?php else: ?>
                                        <a class="pl-1" target="_blank" href="<?php echo e(route('user.items.edit', $item->id)); ?>">
                                            <i class="fas fa-external-link-alt"></i>
                                            <?php echo e(__('products.edit-item-link')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- start item section after breadcrumb -->
                    <?php if($item_sections_after_breadcrumb->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_breadcrumb_key => $after_breadcrumb_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_breadcrumb_section->item_section_title); ?></h4>

                                    <?php
                                        $after_breadcrumb_section_collections = $after_breadcrumb_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_breadcrumb_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_breadcrumb_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_breadcrumb_section_collections_key => $after_breadcrumb_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_breadcrumb_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_breadcrumb = \App\Product::find($after_breadcrumb_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_breadcrumb->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_breadcrumb->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_breadcrumb->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_breadcrumb->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_breadcrumb->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_breadcrumb->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_breadcrumb->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_breadcrumb->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after breadcrumb -->

                    <?php if($ads_before_gallery->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_gallery_key => $ad_before_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_gallery->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_gallery->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_gallery->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_gallery->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <?php if(count($item->galleries) > 0): ?>
                                <div id="item-image-gallery">
                                    <?php $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name)); ?>" rel="item-image-gallery-thumb">
                                            <img alt="Image" src="<?php echo e(empty($gallery->item_image_gallery_thumb_name) ? Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) : Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_thumb_name)); ?>"/>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>

                                <div class="text-center">
                                    <?php if(empty($item->item_image)): ?>
                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image.webp')); ?>" alt="Image" class="img-fluid rounded">
                                    <?php else: ?>
                                        <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                            <hr>
                        </div>
                    </div>

                    <!-- start item section after gallery -->
                    <?php if($item_sections_after_gallery->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_gallery_key => $after_gallery_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_gallery_section->item_section_title); ?></h4>

                                    <?php
                                        $after_gallery_section_collections = $after_gallery_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_gallery_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_gallery_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_gallery_section_collections_key => $after_gallery_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_gallery_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_gallery = \App\Product::find($after_gallery_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_gallery->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_gallery->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_gallery->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_gallery->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_gallery->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_gallery->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_gallery->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_gallery->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after gallery -->

                    <?php if(!empty($item->item_youtube_id)): ?>

                        <div class="row mb-3">
                            <div class="col-12">
                                <h4 class="h5 mb-4 text-black"><?php echo e(__('customization.item.video')); ?></h4>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/<?php echo e($item->item_youtube_id); ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <hr>
                            </div>
                        </div>

                    <?php endif; ?>

                    <?php if($ads_before_description->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_description_key => $ad_before_description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_description->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_description->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_description->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_description->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="h5 mb-4 text-black"><?php echo e(__('frontend.item.description')); ?></h4>
                            <p><?php echo clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>
                            <hr>
                        </div>
                    </div>

                    <!-- start item section after description -->
                    <?php if($item_sections_after_description->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_description_key => $after_description_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_description_section->item_section_title); ?></h4>

                                    <?php
                                        $after_description_section_collections = $after_description_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_description_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_description_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_description_section_collections_key => $after_description_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_description_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_description = \App\Product::find($after_description_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_description->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_description->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_description->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_description->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_description->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_description->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_description->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_description->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after description -->

                    <?php if($ads_before_location->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_location_key => $ad_before_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_location->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_location->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_location->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_location->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="h5 mb-4 text-black"><?php echo e(__('frontend.item.location')); ?></h4>
                            <div class="row pt-2 pb-2">
                                <div class="col-12">
                                    <div id="mapid-item"></div>

                                    <div class="row align-items-center pt-2">
                                        <div class="col-7">
                                            <small>
                                                <?php if($item->item_address_hide == 0): ?>
                                                    <?php echo e($item->item_address); ?>

                                                <?php endif; ?>
                                                    <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?>

                                            </small>
                                        </div>
                                        <div class="col-5 text-right">
                                            <a class="btn btn-primary btn-sm rounded text-white" href="<?php echo e('https://www.google.com/maps/dir/?api=1&destination=' . $item->item_lat . ',' . $item->item_lng); ?>" target="_blank">
                                                <i class="fas fa-directions"></i>
                                                <?php echo e(__('google_map.get-directions')); ?>

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <!-- start item section after location map -->
                    <?php if($item_sections_after_location_map->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_location_map; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_location_map_key => $after_location_map_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_location_map_section->item_section_title); ?></h4>

                                    <?php
                                        $after_location_map_section_collections = $after_location_map_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_location_map_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_location_map_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_location_map_section_collections_key => $after_location_map_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_location_map_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_location_map = \App\Product::find($after_location_map_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_location_map->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_location_map->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_location_map->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_location_map->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_location_map->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_location_map->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_location_map->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_location_map->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after location map -->

                    <?php if($ads_before_features->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_features_key => $ad_before_features): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_features->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_features->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_features->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_features->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if($item_features->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <h4 class="h5 mb-4 text-black"><?php echo e(__('frontend.item.features')); ?></h4>

                                <?php $__currentLoopData = $item_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_features_key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row pt-2 pb-2 mt-2 mb-2 border-left <?php echo e($item_features_key%2 == 0 ? 'bg-light' : ''); ?>">
                                            <div class="col-3">
                                                <?php echo e($feature->customField->custom_field_name); ?>

                                            </div>

                                            <div class="col-9">
                                                <?php if($feature->item_feature_value): ?>
                                                    <?php if($feature->customField->custom_field_type == \App\CustomField::TYPE_LINK): ?>
                                                        <?php
                                                            $parsed_url = parse_url($feature->item_feature_value);
                                                        ?>

                                                        <?php if(is_array($parsed_url) && array_key_exists('host', $parsed_url)): ?>
                                                            <a target="_blank" rel=”nofollow” href="<?php echo e($feature->item_feature_value); ?>">
                                                                <?php echo e($parsed_url['host']); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <?php echo clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                                        <?php endif; ?>

                                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT): ?>
                                                        <?php if(count(explode(',', $feature->item_feature_value))): ?>

                                                            <?php $__currentLoopData = explode(',', $feature->item_feature_value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_feature_value_multiple_select_key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span class="review"><?php echo e($value); ?></span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <?php else: ?>
                                                            <?php echo e($feature->item_feature_value); ?>

                                                        <?php endif; ?>

                                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_SELECT): ?>
                                                        <?php echo e($feature->item_feature_value); ?>


                                                    <?php elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_TEXT): ?>
                                                        <?php echo clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <hr>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- start item section after features -->
                    <?php if($item_sections_after_features->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_features_key => $after_features_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_features_section->item_section_title); ?></h4>

                                    <?php
                                        $after_features_section_collections = $after_features_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_features_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_features_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_features_section_collections_key => $after_features_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_features_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_features = \App\Product::find($after_features_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_features->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_features->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_features->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_features->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_features->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_features->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_features->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_features->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after features -->

                    <?php if($ads_before_reviews->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_reviews_key => $ad_before_reviews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_reviews->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_reviews->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_reviews->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_reviews->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 id="review-section" class="h5 mb-4 text-black"><?php echo e(__('review.frontend.reviews-cap')); ?></h4>
                            <?php if($reviews->count() == 0): ?>

                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="row mb-3 pt-3 pb-3 bg-light">
                                        <div class="col-md-12 text-center">
                                            <p class="mb-0">
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                                <span class="icon-star text-warning"></span>
                                            </p>
                                            <span><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>

                                            <div class="row mt-2">
                                                <div class="col-md-12 text-center">
                                                    <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php if($item->user_id != Auth::user()->id): ?>

                                        <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                            <div class="row mb-3 pt-3 pb-3 bg-light">
                                                <div class="col-md-9">
                                                    <?php echo e(__('review.frontend.posted-a-review', ['item_name' => $item->item_title])); ?>

                                                </div>
                                                <div class="col-md-3 text-right">
                                                    <?php if(Auth::user()->isAdmin()): ?>
                                                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php else: ?>
                                                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        <?php else: ?>
                                            <div class="row mb-3 pt-3 pb-3 bg-light">
                                                <div class="col-md-12 text-center">
                                                    <p class="mb-0">
                                                        <span class="icon-star text-warning"></span>
                                                        <span class="icon-star text-warning"></span>
                                                        <span class="icon-star text-warning"></span>
                                                        <span class="icon-star text-warning"></span>
                                                        <span class="icon-star text-warning"></span>
                                                    </p>
                                                    <span><?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?></span>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12 text-center">
                                                            <?php if(Auth::user()->isAdmin()): ?>
                                                                <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                            <?php else: ?>
                                                                <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <div class="row mb-3 pt-3 pb-3 bg-light">
                                            <div class="col-md-12 text-center">
                                                <span><?php echo e(__('review.frontend.no-review', ['item_name' => $item->item_title])); ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                            <?php else: ?>

                                <div class="row mb-3 pt-3 pb-3 bg-light">
                                    <div class="col-md-9">
                                        <?php if(auth()->guard()->guest()): ?>
                                            <?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?>

                                        <?php else: ?>
                                            <?php if($item->user_id != Auth::user()->id): ?>

                                                <?php if(Auth::user()->isAdmin()): ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <?php echo e(__('review.frontend.posted-a-review', ['item_name' => $item->item_title])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?>

                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <?php echo e(__('review.frontend.posted-a-review', ['item_name' => $item->item_title])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('review.frontend.start-a-review', ['item_name' => $item->item_title])); ?>

                                                    <?php endif; ?>

                                                <?php endif; ?>

                                            <?php else: ?>
                                                <?php echo e(__('review.frontend.my-reviews')); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <?php if(auth()->guard()->guest()): ?>
                                            <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                        <?php else: ?>

                                            <?php if($item->user_id != Auth::user()->id): ?>

                                                <?php if(Auth::user()->isAdmin()): ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php else: ?>
                                                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                    <?php endif; ?>

                                                <?php else: ?>
                                                    <?php if($item->reviewedByUser(Auth::user()->id)): ?>
                                                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.edit', ['item_slug' => $item->item_slug, 'review' => $item->getReviewByUser(Auth::user()->id)->id])); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.edit-a-review')); ?></a>
                                                    <?php else: ?>
                                                        <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.items.reviews.create', $item->item_slug)); ?>" target="_blank"><i class="fas fa-star"></i> <?php echo e(__('review.backend.write-a-review')); ?></a>
                                                    <?php endif; ?>

                                                <?php endif; ?>

                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Start review summary -->
                                <?php if($item_count_rating > 0): ?>

                                    <div class="row mt-4 mb-3">
                                        <div class="col-12 text-right">
                                            <form action="<?php echo e(route('page.item', ['item_slug' => $item->item_slug])); ?>#review-section" method="GET" class="form-inline" id="item-rating-sort-by-form">
                                                <div class="form-group">
                                                    <label for="rating_sort_by"><?php echo e(__('rating_summary.sort-by')); ?></label>
                                                    <select class="custom-select ml-2 <?php $__errorArgs = ['rating_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rating_sort_by" id="rating_sort_by">
                                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_NEWEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_NEWEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-newest')); ?></option>
                                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_OLDEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_OLDEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-oldest')); ?></option>
                                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_HIGHEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_HIGHEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-highest')); ?></option>
                                                        <option value="<?php echo e(\App\Item::ITEM_RATING_SORT_BY_LOWEST); ?>" <?php echo e($rating_sort_by == \App\Item::ITEM_RATING_SORT_BY_LOWEST ? 'selected' : ''); ?>><?php echo e(__('rating_summary.sort-by-lowest')); ?></option>
                                                    </select>
                                                    <?php $__errorArgs = ['rating_sort_by'];
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
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-3 bg-primary text-white">
                                            <div id="review_summary">
                                                <strong><?php echo e(number_format($item_average_rating, 1)); ?></strong>
                                                <?php if($item_count_rating > 1): ?>
                                                    <small><?php echo e(__('rating_summary.based-on-reviews', ['item_rating_count' => $item_count_rating])); ?></small>
                                                <?php else: ?>
                                                    <small><?php echo e(__('rating_summary.based-on-review', ['item_rating_count' => $item_count_rating])); ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <!-- Rating Progeress Bar -->
                                            <div class="row">
                                                <div class="col-lg-10 col-9 mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($item_one_star_percentage); ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3"><small><strong><?php echo e(__('rating_summary.1-stars')); ?></strong></small></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10 col-9 mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($item_two_star_percentage); ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3"><small><strong><?php echo e(__('rating_summary.2-stars')); ?></strong></small></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10 col-9 mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($item_three_star_percentage); ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3"><small><strong><?php echo e(__('rating_summary.3-stars')); ?></strong></small></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10 col-9 mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($item_four_star_percentage); ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3"><small><strong><?php echo e(__('rating_summary.4-stars')); ?></strong></small></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-10 col-9 mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo e($item_five_star_percentage); ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-3"><small><strong><?php echo e(__('rating_summary.5-stars')); ?></strong></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                <?php endif; ?>
                            <!-- End review summary -->

                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row mb-3">
                                        <div class="col-md-4">

                                            <div class="row align-items-center mb-3">
                                                <div class="col-4">
                                                    <?php if(empty(\App\User::find($review->author_id)->user_image)): ?>
                                                        <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($review->author_id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                                    <?php else: ?>

                                                        <img src="<?php echo e(Storage::disk('public')->url('user/' . \App\User::find($review->author_id)->user_image)); ?>" alt="<?php echo e(\App\User::find($review->author_id)->name); ?>" class="img-fluid rounded-circle">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-8 pl-0">
                                                    <span><?php echo e(\App\User::find($review->author_id)->name); ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <span><?php echo e(__('review.backend.overall-rating')); ?></span>

                                                    <div class="pl-0 rating_stars rating_stars_<?php echo e($review->id); ?>" data-id="rating_stars_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->rating); ?>"></div>
                                                </div>
                                            </div>

                                            <?php if($review->recommend == \App\Item::ITEM_REVIEW_RECOMMEND_YES): ?>
                                                <div class="row mb-2">
                                                    <div class="col-md-12">
                                                <span class="bg-success text-white pl-2 pr-2 pt-2 pb-2 rounded">
                                                    <i class="fas fa-check"></i>
                                                    <?php echo e(__('review.backend.recommend')); ?>

                                                </span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <div class="col-md-8">

                                            <div class="row mb-0">
                                                <div class="col-md-6">
                                                    <span class="font-size-13"><?php echo e(__('review.backend.customer-service')); ?></span>

                                                    <div class="pl-0 rating_stars rating_stars_customer_service_<?php echo e($review->id); ?>" data-id="rating_stars_customer_service_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->customer_service_rating); ?>"></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <span class="font-size-13"><?php echo e(__('review.backend.quality')); ?></span>

                                                    <div class="pl-0 rating_stars rating_stars_quality_<?php echo e($review->id); ?>" data-id="rating_stars_quality_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->quality_rating); ?>"></div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <span class="font-size-13"><?php echo e(__('review.backend.friendly')); ?></span>

                                                    <div class="pl-0 rating_stars rating_stars_friendly_<?php echo e($review->id); ?>" data-id="rating_stars_friendly_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->friendly_rating); ?>"></div>
                                                </div>

                                                <div class="col-md-6">
                                                    <span class="font-size-13"><?php echo e(__('review.backend.pricing')); ?></span>

                                                    <div class="pl-0 rating_stars rating_stars_pricing_<?php echo e($review->id); ?>" data-id="rating_stars_pricing_<?php echo e($review->id); ?>" data-rating="<?php echo e($review->pricing_rating); ?>"></div>
                                                </div>
                                            </div>

                                            <?php if(!empty($review->title)): ?>
                                                <div class="row mb-2">
                                                    <div class="col-md-12">
                                                        <span class="text-black"><?php echo e($review->title); ?></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="row mb-1">
                                                <div class="col-md-12">
                                                    <p><?php echo clean(nl2br($review->body), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>
                                                </div>
                                            </div>

                                            <?php if($item->reviewGalleryCountByReviewId($review->id)): ?>
                                                <div class="row mb-1">
                                                    <div class="col-md-12" id="review-image-gallery-<?php echo e($review->id); ?>">
                                                        <?php $__currentLoopData = $item->getReviewGalleriesByReviewId($review->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_1 => $review_image_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_name)); ?>" rel="review-image-gallery-thumb<?php echo e($review->id); ?>">
                                                                <img alt="Image" src="<?php echo e(Storage::disk('public')->url('item/review/' . $review_image_gallery->review_image_gallery_thumb_name)); ?>"/>
                                                            </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <span class="review font-size-13"><?php echo e(__('review.backend.posted-at') . ' ' . \Carbon\Carbon::parse($review->created_at)->diffForHumans()); ?></span>
                                                    <?php if($review->created_at != $review->updated_at): ?>
                                                        <span class="review font-size-13"><?php echo e(__('review.backend.updated-at') . ' ' . \Carbon\Carbon::parse($review->updated_at)->diffForHumans()); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- start item section after reviews -->
                    <?php if($item_sections_after_reviews->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_reviews_key => $after_reviews_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_reviews_section->item_section_title); ?></h4>

                                    <?php
                                        $after_reviews_section_collections = $after_reviews_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_reviews_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_reviews_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_reviews_section_collections_key => $after_reviews_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_reviews_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_reviews = \App\Product::find($after_reviews_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_reviews->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_reviews->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_reviews->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_reviews->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_reviews->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_reviews->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_reviews->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_reviews->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after reviews -->

                    <?php if($ads_before_comments->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_comments_key => $ad_before_comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_comments->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_comments->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_comments->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="h5 mb-4 text-black"><?php echo e(__('frontend.item.comments')); ?></h4>

                            <?php echo $__env->make('comments::components.comments', [
                            'model' => $item,
                            'approved' => true,
                            'perPage' => 10
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <hr>
                        </div>
                    </div>

                    <!-- start item section after comments -->
                    <?php if($item_sections_after_comments->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_comments_key => $after_comments_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_comments_section->item_section_title); ?></h4>

                                    <?php
                                        $after_comments_section_collections = $after_comments_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_comments_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_comments_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_comments_section_collections_key => $after_comments_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_comments_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_comments = \App\Product::find($after_comments_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_comments->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_comments->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_comments->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_comments->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_comments->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_comments->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_comments->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_comments->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after comments -->

                    <?php if($ads_before_share->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_share_key => $ad_before_share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_share->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_share->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_share->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="h5 mb-4 text-black"><?php echo e(__('frontend.item.share')); ?></h4>
                            <div class="row">
                                <div class="col-12">

                                    <!-- Create link with share to Facebook -->
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                                        <i class="fab fa-facebook-f"></i>
                                        <?php echo e(__('social_share.facebook')); ?>

                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                                        <i class="fab fa-twitter"></i>
                                        <?php echo e(__('social_share.twitter')); ?>

                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                        <?php echo e(__('social_share.linkedin')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                                        <i class="fab fa-blogger-b"></i>
                                        <?php echo e(__('social_share.blogger')); ?>

                                    </a>

                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                                        <i class="fab fa-pinterest-p"></i>
                                        <?php echo e(__('social_share.pinterest')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                                        <i class="fab fa-evernote"></i>
                                        <?php echo e(__('social_share.evernote')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                                        <i class="fab fa-reddit-alien"></i>
                                        <?php echo e(__('social_share.reddit')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                                        <i class="fab fa-buffer"></i>
                                        <?php echo e(__('social_share.buffer')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                                        <i class="fab fa-wordpress-simple"></i>
                                        <?php echo e(__('social_share.wordpress')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                                        <i class="fab fa-weibo"></i>
                                        <?php echo e(__('social_share.weibo')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                                        <i class="fab fa-skype"></i>
                                        <?php echo e(__('social_share.skype')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                                        <i class="fab fa-telegram-plane"></i>
                                        <?php echo e(__('social_share.telegram')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                                        <i class="fab fa-viber"></i>
                                        <?php echo e(__('social_share.viber')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        <?php echo e(__('social_share.whatsapp')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                                        <i class="fab fa-weixin"></i>
                                        <?php echo e(__('social_share.wechat')); ?>

                                    </a>
                                    <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                                        <i class="fab fa-line"></i>
                                        <?php echo e(__('social_share.line')); ?>

                                    </a>

                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <?php if($ads_after_share->count() > 0): ?>
                        <?php $__currentLoopData = $ads_after_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_share_key => $ad_after_share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-3">
                                <?php if($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_after_share->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_after_share->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_after_share->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <!-- start item section after share -->
                    <?php if($item_sections_after_share->count() > 0): ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php $__currentLoopData = $item_sections_after_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sections_after_share_key => $after_share_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4 class="h5 mb-4 text-black"><?php echo e($after_share_section->item_section_title); ?></h4>

                                    <?php
                                        $after_share_section_collections = $after_share_section->itemSectionCollections()->orderBy('item_section_collection_order')->get();
                                    ?>

                                    <?php if($after_share_section_collections->count() > 0): ?>
                                        <div class="row">
                                            <?php $__currentLoopData = $after_share_section_collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after_share_section_collections_key => $after_share_section_collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-6 col-sm-12 mb-3">

                                                    <?php if($after_share_section_collection->item_section_collection_collectible_type == \App\ItemSectionCollection::COLLECTIBLE_TYPE_PRODUCT): ?>
                                                        <?php
                                                            $find_product_after_share = \App\Product::find($after_share_section_collection->item_section_collection_collectible_id);
                                                        ?>
                                                        <div class="row align-items-center border-right">
                                                            <div class="col-md-5 col-4">
                                                                <a href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_share->product_slug])); ?>">
                                                                    <?php if(empty($find_product_after_share->product_image_small)): ?>
                                                                        <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(Storage::disk('public')->url('product/' . $find_product_after_share->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="pl-0 col-md-7 col-8">

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="text-black"><?php echo e(str_limit($find_product_after_share->product_name, 20)); ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span><?php echo e(str_limit($find_product_after_share->product_description, 40)); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php if(!empty($find_product_after_share->product_price)): ?>
                                                                            <span class="text-black"><?php echo e($site_global_settings->setting_product_currency_symbol . $find_product_after_share->product_price); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="row mt-1">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-sm btn-outline-primary btn-block rounded" href="<?php echo e(route('page.product', ['item_slug' => $item->item_slug, 'product_slug' => $find_product_after_share->product_slug])); ?>">
                                                                            <?php echo e(__('item_section.read-more')); ?>

                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- end item section after share -->

                    <?php if(!$item_has_claimed): ?>
                    <div class="row pt-3 pb-3 pl-2 pr-2 border border-dark rounded bg-light align-items-center">
                        <div class="col-sm-12 col-md-9 pr-0">
                            <h4 class="h5 text-black"><?php echo e(__('item_claim.claim-business')); ?></h4>
                            <span><?php echo e(__('item_claim.unclaimed-desc')); ?></span>
                        </div>
                        <div class="col-sm-12 col-md-3 text-right">
                            <?php if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->isAdmin()): ?>
                                <a class="btn btn-primary rounded text-white" href="<?php echo e(route('admin.item-claims.create', ['item_slug' => $item->item_slug])); ?>" target="_blank"><?php echo e(__('item_claim.claim-business-button')); ?></a>
                            <?php else: ?>
                                <a class="btn btn-primary rounded text-white" href="<?php echo e(route('user.item-claims.create', ['item_slug' => $item->item_slug])); ?>" target="_blank"><?php echo e(__('item_claim.claim-business-button')); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

                <div class="col-lg-3 ml-auto">

                    <div class="pt-3">

                        <?php if($ads_before_sidebar_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_before_sidebar_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_sidebar_content_key => $ad_before_sidebar_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-5">
                                    <?php if($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_before_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_before_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_before_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="row mb-2 align-items-center">
                            <div class="col-12">
                                <h3 class="h5 text-black"><?php echo e(__('rating_summary.managed-by')); ?></h3>
                            </div>
                        </div>

                        <div class="row mb-5 align-items-center">
                            <div class="col-4">
                                <?php if(empty($item->user->user_image)): ?>
                                    <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                <?php else: ?>

                                    <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>" class="img-fluid rounded-circle">
                                <?php endif; ?>
                            </div>
                            <div class="col-8 pl-0">
                                <span class="font-size-13"><?php echo e($item->user->name); ?></span><br/>
                                <span class="font-size-13"><?php echo e(__('frontend.item.posted') . ' ' . $item->created_at->diffForHumans()); ?></span>
                            </div>
                        </div>

                        <?php if(!Auth::check() || (Auth::check() && Auth::user()->id != $item->user_id)): ?>
                        <div class="row mb-2 align-items-center">
                            <div class="col-12">
                                <h3 class="h5 text-black"><?php echo e(__('rating_summary.contact')); ?></h3>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row mb-5 align-items-center">
                            <div class="col-12">

                            <?php if(Auth::check()): ?>

                                <?php if(Auth::user()->id != $item->user_id): ?>

                                    <?php if(Auth::user()->isAdmin()): ?>

                                        <!-- message item owner contact form -->
                                        <form method="POST" action="<?php echo e(route('admin.messages.store')); ?>" class="">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                                <input type="hidden" name="item" value="<?php echo e($item->id); ?>">
                                                <div class="form-group">
                                                    <input id="subject" type="text" class="form-control rounded <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                                    <?php $__errorArgs = ['subject'];
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
                                                <div class="form-group">
                                                    <textarea rows="6" id="message" type="text" class="form-control rounded <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                                    <?php $__errorArgs = ['message'];
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
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-outline-primary btn-block rounded">
                                                        <?php echo e(__('frontend.item.send-message')); ?>

                                                    </button>
                                                </div>
                                            </form>
                                    <?php else: ?>
                                        <!-- message item owner contact form -->
                                        <form method="POST" action="<?php echo e(route('user.messages.store')); ?>" class="">
                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                            <input type="hidden" name="item" value="<?php echo e($item->id); ?>">
                                            <div class="form-group">
                                                <input id="subject" type="text" class="form-control rounded <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                                <?php $__errorArgs = ['subject'];
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
                                            <div class="form-group">
                                                <textarea rows="6" id="message" type="text" class="form-control rounded <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                                <?php $__errorArgs = ['message'];
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
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-primary btn-block rounded">
                                                    <?php echo e(__('frontend.item.send-message')); ?>

                                                </button>
                                            </div>
                                        </form>
                                    <?php endif; ?>

                                <?php endif; ?>

                            <?php else: ?>
                                <!-- message item owner contact form -->
                                <form method="POST" action="<?php echo e(route('user.messages.store')); ?>" class="">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                    <input type="hidden" name="item" value="<?php echo e($item->id); ?>">
                                    <div class="form-group">
                                        <input id="subject" type="text" class="form-control rounded <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                        <?php $__errorArgs = ['subject'];
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
                                    <div class="form-group">
                                        <textarea rows="6" id="message" type="text" class="form-control rounded <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                        <?php $__errorArgs = ['message'];
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
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-block rounded">
                                            <?php echo e(__('frontend.item.send-message')); ?>

                                        </button>
                                    </div>
                                </form>
                            <?php endif; ?>

                            </div>
                        </div>


                        <?php echo $__env->make('frontend.partials.search.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if($ads_after_sidebar_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_after_sidebar_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_sidebar_content_key => $ad_after_sidebar_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mt-5">
                                    <?php if($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_after_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_after_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_after_sidebar_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php if($similar_items->count() > 0): ?>
    <div class="site-section bg-light">
        <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.item.similar-listings')); ?></h2>
            </div>
        </div>
        <div class="row mt-5">

            <?php $__currentLoopData = $similar_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $similar_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                    <div class="d-block d-md-flex listing">
                        <a href="<?php echo e(route('page.item', $similar_item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($similar_item->item_image_small) ? Storage::disk('public')->url('item/' . $similar_item->item_image_small) : (!empty($similar_item->item_image) ? Storage::disk('public')->url('item/' . $similar_item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.webp'))); ?>)"></a>
                        <div class="lh-content">

                            <?php $__currentLoopData = $similar_item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                    <span class="category"><?php echo e($category->category_name); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($similar_item->allCategories()->count() > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
                                <span class="category"><?php echo e(__('categories.and') . " " . strval($similar_item->allCategories()->count() - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " " . __('categories.more')); ?></span>
                            <?php endif; ?>

                            <h3 class="pt-2"><a href="<?php echo e(route('page.item', $similar_item->item_slug)); ?>"><?php echo e($similar_item->item_title); ?></a></h3>
                            <address>
                                <a href="<?php echo e(route('page.city', ['state_slug'=>$similar_item->state->state_slug, 'city_slug'=>$similar_item->city->city_slug])); ?>"><?php echo e($similar_item->city->city_name); ?></a>,
                                <a href="<?php echo e(route('page.state', ['state_slug'=>$similar_item->state->state_slug])); ?>"><?php echo e($similar_item->state->state_name); ?></a>
                            </address>

                            <?php if($similar_item->getCountRating() > 0): ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pl-0 rating_stars rating_stars_<?php echo e($similar_item->item_slug); ?>" data-id="rating_stars_<?php echo e($similar_item->item_slug); ?>" data-rating="<?php echo e($similar_item->getAverageRating()); ?>"></div>
                                        <address class="mt-1">
                                            <?php if($similar_item->getCountRating() == 1): ?>
                                                <?php echo e('(' . $similar_item->getCountRating() . ' ' . __('review.frontend.review') . ')'); ?>

                                            <?php else: ?>
                                                <?php echo e('(' . $similar_item->getCountRating() . ' ' . __('review.frontend.reviews') . ')'); ?>

                                            <?php endif; ?>
                                        </address>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-2 pr-0">
                                    <?php if(empty($similar_item->user->user_image)): ?>
                                        <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($similar_item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                    <?php else: ?>

                                        <img src="<?php echo e(Storage::disk('public')->url('user/' . $similar_item->user->user_image)); ?>" alt="<?php echo e($similar_item->user->name); ?>" class="img-fluid rounded-circle">
                                    <?php endif; ?>
                                </div>
                                <div class="col-10 line-height-1-2">

                                    <div class="row pb-1">
                                        <div class="col-12">
                                            <span class="font-size-13"><?php echo e($similar_item->user->name); ?></span>
                                        </div>
                                    </div>
                                    <div class="row line-height-1-0">
                                        <div class="col-12">
                                            <?php if($similar_item->totalComments() > 1): ?>
                                                <span class="review"><?php echo e($similar_item->totalComments() . ' comments'); ?></span>
                                            <?php elseif($similar_item->totalComments() == 1): ?>
                                                <span class="review"><?php echo e($similar_item->totalComments() . ' comment'); ?></span>
                                            <?php endif; ?>
                                            <span class="review"><?php echo e($similar_item->created_at->diffForHumans()); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    </div>
    <?php endif; ?>

    <?php if($nearby_items->count() > 0): ?>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 text-left border-primary">
                    <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.item.nearby-listings')); ?></h2>
                </div>
            </div>
            <div class="row mt-5">

                <?php $__currentLoopData = $nearby_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nearby_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                        <div class="d-block d-md-flex listing">
                            <a href="<?php echo e(route('page.item', $nearby_item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($nearby_item->item_image_small) ? Storage::disk('public')->url('item/' . $nearby_item->item_image_small) : (!empty($nearby_item->item_image) ? Storage::disk('public')->url('item/' . $nearby_item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.webp'))); ?>)"></a>
                            <div class="lh-content">

                                <?php $__currentLoopData = $nearby_item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                        <span class="category"><?php echo e($category->category_name); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($nearby_item->allCategories()->count() > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
                                    <span class="category"><?php echo e(__('categories.and') . " " . strval($nearby_item->allCategories()->count() - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " " . __('categories.more')); ?></span>
                                <?php endif; ?>

                                <h3 class="pt-2"><a href="<?php echo e(route('page.item', $nearby_item->item_slug)); ?>"><?php echo e($nearby_item->item_title); ?></a></h3>
                                <address>
                                    <a href="<?php echo e(route('page.city', ['state_slug'=>$nearby_item->state->state_slug, 'city_slug'=>$nearby_item->city->city_slug])); ?>"><?php echo e($nearby_item->city->city_name); ?></a>,
                                    <a href="<?php echo e(route('page.state', ['state_slug'=>$nearby_item->state->state_slug])); ?>"><?php echo e($nearby_item->state->state_name); ?></a>
                                </address>

                                <?php if($nearby_item->getCountRating() > 0): ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($nearby_item->item_slug); ?>" data-id="rating_stars_<?php echo e($nearby_item->item_slug); ?>" data-rating="<?php echo e($nearby_item->getAverageRating()); ?>"></div>
                                            <address class="mt-1">
                                                <?php if($nearby_item->getCountRating() == 1): ?>
                                                    <?php echo e('(' . $nearby_item->getCountRating() . ' ' . __('review.frontend.review') . ')'); ?>

                                                <?php else: ?>
                                                    <?php echo e('(' . $nearby_item->getCountRating() . ' ' . __('review.frontend.reviews') . ')'); ?>

                                                <?php endif; ?>
                                            </address>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-2 pr-0">
                                        <?php if(empty($nearby_item->user->user_image)): ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($nearby_item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                        <?php else: ?>

                                            <img src="<?php echo e(Storage::disk('public')->url('user/' . $nearby_item->user->user_image)); ?>" alt="<?php echo e($nearby_item->user->name); ?>" class="img-fluid rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-10 line-height-1-2">

                                        <div class="row pb-1">
                                            <div class="col-12">
                                                <span class="font-size-13"><?php echo e($nearby_item->user->name); ?></span>
                                            </div>
                                        </div>
                                        <div class="row line-height-1-0">
                                            <div class="col-12">
                                                <?php if($nearby_item->totalComments() > 1): ?>
                                                    <span class="review"><?php echo e($nearby_item->totalComments() . ' comments'); ?></span>
                                                <?php elseif($nearby_item->totalComments() == 1): ?>
                                                    <span class="review"><?php echo e($nearby_item->totalComments() . ' comment'); ?></span>
                                                <?php endif; ?>
                                                <span class="review"><?php echo e($nearby_item->created_at->diffForHumans()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>

<!-- Modal - share -->
<div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('frontend.item.share-listing')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">

                        <p><?php echo e(__('frontend.item.share-listing-social-media')); ?></p>

                        <!-- Create link with share to Facebook -->
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                            <i class="fab fa-facebook-f"></i>
                            <?php echo e(__('social_share.facebook')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                            <i class="fab fa-twitter"></i>
                            <?php echo e(__('social_share.twitter')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                            <?php echo e(__('social_share.linkedin')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                            <i class="fab fa-blogger-b"></i>
                            <?php echo e(__('social_share.blogger')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                            <i class="fab fa-pinterest-p"></i>
                            <?php echo e(__('social_share.pinterest')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                            <i class="fab fa-evernote"></i>
                            <?php echo e(__('social_share.evernote')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                            <i class="fab fa-reddit-alien"></i>
                            <?php echo e(__('social_share.reddit')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                            <i class="fab fa-buffer"></i>
                            <?php echo e(__('social_share.buffer')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                            <i class="fab fa-wordpress-simple"></i>
                            <?php echo e(__('social_share.wordpress')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                            <i class="fab fa-weibo"></i>
                            <?php echo e(__('social_share.weibo')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                            <i class="fab fa-skype"></i>
                            <?php echo e(__('social_share.skype')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                            <i class="fab fa-telegram-plane"></i>
                            <?php echo e(__('social_share.telegram')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                            <i class="fab fa-viber"></i>
                            <?php echo e(__('social_share.viber')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            <?php echo e(__('social_share.whatsapp')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                            <i class="fab fa-weixin"></i>
                            <?php echo e(__('social_share.wechat')); ?>

                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                            <i class="fab fa-line"></i>
                            <?php echo e(__('social_share.line')); ?>

                        </a>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo e(__('frontend.item.share-listing-email')); ?></p>
                        <?php if(!Auth::check()): ?>
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo e(__('frontend.item.login-require')); ?>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('page.item.email', ['item_slug' => $item->item_slug])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-row mb-3">
                                <div class="col-md-4">
                                    <label for="item_share_email_name" class="text-black"><?php echo e(__('frontend.item.name')); ?></label>
                                    <input id="item_share_email_name" type="text" class="form-control <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_name" value="<?php echo e(old('item_share_email_name')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                    <?php $__errorArgs = ['item_share_email_name'];
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
                                    <label for="item_share_email_from_email" class="text-black"><?php echo e(__('frontend.item.email')); ?></label>
                                    <input id="item_share_email_from_email" type="email" class="form-control <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_from_email" value="<?php echo e(old('item_share_email_from_email')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                    <?php $__errorArgs = ['item_share_email_from_email'];
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
                                    <label for="item_share_email_to_email" class="text-black"><?php echo e(__('frontend.item.email-to')); ?></label>
                                    <input id="item_share_email_to_email" type="email" class="form-control <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="item_share_email_to_email" value="<?php echo e(old('item_share_email_to_email')); ?>" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                    <?php $__errorArgs = ['item_share_email_to_email'];
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
                                    <label for="item_share_email_note" class="text-black"><?php echo e(__('frontend.item.add-note')); ?></label>
                                    <textarea class="form-control <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="item_share_email_note" rows="3" name="item_share_email_note" <?php echo e(Auth::check() ? '' : 'disabled'); ?>><?php echo e(old('item_share_email_note')); ?></textarea>
                                    <?php $__errorArgs = ['item_share_email_note'];
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
                            <div class="form-row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary py-2 px-4 text-white rounded" <?php echo e(Auth::check() ? '' : 'disabled'); ?>>
                                        <?php echo e(__('frontend.item.send-email')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php if($item_total_categories > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
<!-- Modal show categories -->
<div class="modal fade" id="showCategoriesModal" tabindex="-1" role="dialog" aria-labelledby="showCategoriesModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('categories.all-cat') . " - " . $item->item_title); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <?php $__currentLoopData = $item_all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $a_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $a_category->category_slug)); ?>">
                                <span class="category"><?php echo e($a_category->category_name); ?></span>
                            </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>
    <?php endif; ?>

    <script src="<?php echo e(asset('frontend/vendor/justified-gallery/jquery.justifiedGallery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/vendor/colorbox/jquery.colorbox-min.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/vendor/goodshare/goodshare.min.js')); ?>"></script>

    <script>
        $(document).ready(function(){

            <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
            /**
             * Start initial map
             */
            var map = L.map('mapid-item', {
                center: [<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>],
                zoom: 13,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>]).addTo(map);
            /**
             * End initial map
             */
            <?php endif; ?>


            /**
             * Start initial image gallery justify gallery
             */
            $("#item-image-gallery").justifiedGallery({
                rowHeight : 150,
                maxRowHeight: 180,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'item-image-gallery-thumb', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            /**
             * End initial image gallery justify gallery
             */

            /**
             * Start initial review image gallery justify gallery
             */
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->reviewGalleryCountByReviewId($review->id)): ?>
            $("#review-image-gallery-<?php echo e($review->id); ?>").justifiedGallery({
                rowHeight : 80,
                maxRowHeight: 100,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'review-image-gallery-thumb-<?php echo e($review->id); ?>', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            /**
             * End initial review image gallery justify gallery
             */

            /**
             * Start initial share button and share modal
             */
            $('.item-share-button').on('click', function(){
                $('#share-modal').modal('show');
            });

            <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            /**
             * End initial share button and share modal
             */

            /**
             * Start initial save button
             */

            // xl view
            $('#item-save-button-xl').on('click', function(){
                $("#item-save-button-xl").addClass("disabled");
                $("#item-save-form-xl").submit();
            });

            $('#item-saved-button-xl').on('click', function(){
                $("#item-saved-button-xl").off("mouseenter");
                $("#item-saved-button-xl").off("mouseleave");
                $("#item-saved-button-xl").addClass("disabled");
                $("#item-unsave-form-xl").submit();
            });

            $("#item-saved-button-xl").on('mouseenter', function(){
                $("#item-saved-button-xl").attr("class", "btn btn-danger rounded text-white");
                $("#item-saved-button-xl").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button-xl").on('mouseleave', function(){
                $("#item-saved-button-xl").attr("class", "btn btn-warning rounded text-white");
                $("#item-saved-button-xl").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });

            // md view
            $('#item-save-button-md').on('click', function(){
                $("#item-save-button-md").addClass("disabled");
                $("#item-save-form-md").submit();
            });

            $('#item-saved-button-md').on('click', function(){
                $("#item-saved-button-md").off("mouseenter");
                $("#item-saved-button-md").off("mouseleave");
                $("#item-saved-button-md").addClass("disabled");
                $("#item-unsave-form-md").submit();
            });

            $("#item-saved-button-md").on('mouseenter', function(){
                $("#item-saved-button-md").attr("class", "btn btn-danger rounded text-white");
                $("#item-saved-button-md").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button-md").on('mouseleave', function(){
                $("#item-saved-button-md").attr("class", "btn btn-warning rounded text-white");
                $("#item-saved-button-md").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });

            // sm view
            $('#item-save-button-sm').on('click', function(){
                $("#item-save-button-sm").addClass("disabled");
                $("#item-save-form-sm").submit();
            });

            $('#item-saved-button-sm').on('click', function(){
                $("#item-saved-button-sm").off("mouseenter");
                $("#item-saved-button-sm").off("mouseleave");
                $("#item-saved-button-sm").addClass("disabled");
                $("#item-unsave-form-sm").submit();
            });

            $("#item-saved-button-sm").on('mouseenter', function(){
                $("#item-saved-button-sm").attr("class", "btn btn-sm btn-danger rounded text-white");
                $("#item-saved-button-sm").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button-sm").on('mouseleave', function(){
                $("#item-saved-button-sm").attr("class", "btn btn-sm btn-warning rounded text-white");
                $("#item-saved-button-sm").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });
            /**
             * End initial save button
             */

            /**
             * Start rating star
             */
            <?php if($item_count_rating > 0): ?>
            $(".rating_stars_header").rateYo({
                spacing: "5px",
                starWidth: "23px",
                readOnly: true,
                rating: <?php echo e($item_average_rating); ?>,
            });
            <?php endif; ?>
            /**
             * End rating star
             */

            /**
             * Start rating sort by
             */
            $('#rating_sort_by').on('change', function() {
                $( "#item-rating-sort-by-form" ).submit();
            });
            /**
             * End rating sort by
             */
        });
    </script>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP): ?>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: <?php echo $item->item_lat; ?>, lng: <?php echo $item->item_lng; ?>};
            // The map, centered at Uluru
            var map = new google.maps.Map(document.getElementById('mapid-item'), {
                zoom: 14,
                center: uluru,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key=<?php echo e($site_global_settings->setting_site_map_google_api_key); ?>&callback=initMap"></script>
    <?php endif; ?>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/item.blade.php ENDPATH**/ ?>