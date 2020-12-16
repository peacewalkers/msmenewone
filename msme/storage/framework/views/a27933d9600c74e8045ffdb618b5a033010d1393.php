<?php $__env->startSection('styles'); ?>
    <link rel="preload" href="<?php echo e(asset('frontend/images/placeholder/header-1.webp')); ?>" as="image">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
        <div class="site-blocks-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-1.webp')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
        <div class="site-blocks-cover overlay" style="background-color: <?php echo e($site_homepage_header_background_color); ?>;" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
        <div class="site-blocks-cover overlay" style="background-image: url( <?php echo e(Storage::disk('public')->url('customization/' . $site_homepage_header_background_image)); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <div class="site-blocks-cover overlay" style="background-color: #333333;" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php endif; ?>


            <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            <div data-youtube="<?php echo e($site_homepage_header_background_youtube_video); ?>"></div>
            <?php endif; ?>

            <div class="container">

        <!-- Start hero section desktop view-->
        <div class="row align-items-center justify-content-center text-center d-none d-md-flex">

            <div class="col-md-12">
                <div class="row justify-content-center mb-1">
                    <div class="col-md-12 text-center">
                        <h1 class="" data-aos="fade-up" style="color: <?php echo e($site_homepage_header_title_font_color); ?>;"><?php echo e(__('frontend.homepage.title')); ?></h1>
                        <p data-aos="fade-up" data-aos-delay="100" style="color: <?php echo e($site_homepage_header_paragraph_font_color); ?>;"><?php echo e(__('frontend.homepage.description')); ?></p>
                    </div>
                </div>
                <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
                    <?php echo $__env->make('frontend.partials.search.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>
        <!-- End hero section desktop view-->

        <!-- Start hero section mobile view-->
        <div class="row align-items-center justify-content-center text-center d-md-none mt-5">

            <div class="col-md-12">
                <div class="row justify-content-center mb-1">
                    <div class="col-md-10 text-center">
                        <h1 class="" data-aos="fade-up"><?php echo e(__('frontend.homepage.title')); ?></h1>
                        <p data-aos="fade-up" data-aos-delay="100"><?php echo e(__('frontend.homepage.description')); ?></p>
                    </div>
                </div>
                <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
                    <?php echo $__env->make('frontend.partials.search.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>
        <!-- End hero section mobile view-->

    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <!-- Start categories section desktop view-->
        <div class="overlap-category mb-5 d-none d-md-block">
            <div class="row align-items-stretch no-gutters">

                <?php if(count($categories)): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="<?php echo e(route('page.category', $category->category_slug)); ?>" class="popular-category h-100">

                                <?php if($category->category_icon): ?>
                                    <span class="icon"><span><i class="<?php echo e($category->category_icon); ?>"></i></span></span>
                                <?php else: ?>
                                    <span class="icon"><span><i class="fas fa-heart"></i></span></span>
                                <?php endif; ?>
                                <span class="caption mb-2 d-block"><?php echo e($category->category_name); ?></span>
                                <span class="number"><?php echo e(number_format($category->getItemsCount($site_global_settings->setting_site_location_country_id))); ?></span>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="<?php echo e(route('page.categories')); ?>" class="popular-category h-100">

                                <span class="icon"><span><i class="fas fa-th"></i></span></span>
                                <span class="caption mb-2 d-block"><?php echo e(__('frontend.homepage.all-categories')); ?></span>
                                <span class="number"><?php echo e($total_items_count); ?></span>
                            </a>
                        </div>
                <?php else: ?>
                    <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                        <p><?php echo e(__('frontend.homepage.no-categories')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End categories section desktop view-->

        <!-- Start categories section mobile view-->
        <div class="overlap-category-sm mb-5 d-md-none">
            <div class="row align-items-stretch no-gutters">

                <?php if(count($categories)): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="<?php echo e(route('page.category', $category->category_slug)); ?>" class="popular-category h-100">

                                <?php if($category->category_icon): ?>
                                    <span class="icon"><span><i class="<?php echo e($category->category_icon); ?>"></i></span></span>
                                <?php else: ?>
                                    <span class="icon"><span><i class="fas fa-heart"></i></span></span>
                                <?php endif; ?>
                                <span class="caption mb-2 d-block"><?php echo e($category->category_name); ?></span>
                                <span class="number"><?php echo e(number_format($category->getItemsCount($site_global_settings->setting_site_location_country_id))); ?></span>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                        <a href="<?php echo e(route('page.categories')); ?>" class="popular-category h-100">

                            <span class="icon"><span><i class="fas fa-th"></i></span></span>
                            <span class="caption mb-2 d-block"><?php echo e(__('frontend.homepage.all-categories')); ?></span>
                            <span class="number"><?php echo e($total_items_count); ?></span>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                        <p><?php echo e(__('frontend.homepage.no-categories')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End categories section mobile view-->

        <div class="row mb-4">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.featured-ads')); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12  block-13">
                <div class="owl-carousel nonloop-block-13">

                    <?php if(count($paid_items)): ?>
                        <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-block d-md-flex listing vertical">
                                <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.webp'))); ?>)"></a>
                                <div class="lh-content">

                                    <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                            <span class="category"><?php echo e($category->category_name); ?></span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($item->allCategories()->count() > \App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE): ?>
                                        <span class="category"><?php echo e(__('categories.and') . " " . strval($item->allCategories()->count() - \App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE) . " " . __('categories.more')); ?></span>
                                    <?php endif; ?>

                                    <h3 class="pt-2"><a href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e(str_limit($item->item_title, 44, '...')); ?></a></h3>
                                    <address>
                                        <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
                                        <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
                                    </address>

                                    <?php if($item->getCountRating() > 0): ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->getAverageRating()); ?>"></div>
                                                <address class="mt-1">
                                                    <?php if($item->getCountRating() == 1): ?>
                                                        <?php echo e('(' . $item->getCountRating() . ' ' . __('review.frontend.review') . ')'); ?>

                                                    <?php else: ?>
                                                        <?php echo e('(' . $item->getCountRating() . ' ' . __('review.frontend.reviews') . ')'); ?>

                                                    <?php endif; ?>
                                                </address>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row align-items-center">
                                        <div class="col-3 pr-1">
                                            <?php if(empty($item->user->user_image)): ?>
                                                <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                            <?php else: ?>

                                                <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>" class="img-fluid rounded-circle">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-9 line-height-1-2">

                                            <div class="row pb-1">
                                                <div class="col-12">
                                                    <span class="font-size-13"><?php echo e($item->user->name); ?></span>
                                                </div>
                                            </div>
                                            <div class="row line-height-1-0">
                                                <div class="col-12">
                                                    <?php if($item->totalComments() > 1): ?>
                                                        <span class="review"><?php echo e($item->totalComments() . ' comments'); ?></span>
                                                    <?php elseif($item->totalComments() == 1): ?>
                                                        <span class="review"><?php echo e($item->totalComments() . ' comment'); ?></span>
                                                    <?php endif; ?>
                                                    <span class="review"><?php echo e($item->created_at->diffForHumans()); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="d-block d-md-flex listing vertical">
                            No featured listings
                        </div>
                    <?php endif; ?>

                </div>
            </div>


        </div>
    </div>
</div>

<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.nearby-listings')); ?></h2>
                <p class="color-black-opacity-5"><?php echo e(__('frontend.homepage.popular-listings')); ?></p>
            </div>
        </div>

        <div class="row">

            <?php if(count($popular_items)): ?>
                <?php $__currentLoopData = $popular_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                        <div class="listing-item listing">
                            <div class="listing-image">
                                <img src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.webp'))); ?>" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-item-content">

                                <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="px-3 mb-3 category" href="<?php echo e(route('page.category', $category->category_slug)); ?>"><?php echo e($category->category_name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($item->allCategories()->count() > \App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE): ?>
                                    <span class="category"><?php echo e(__('categories.and') . " " . strval($item->allCategories()->count() - \App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE) . " " . __('categories.more')); ?></span>
                                <?php endif; ?>

                                <h2 class="mb-1 pt-2"><a href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a></h2>
                                <span class="address">
                                    <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
                                    <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
                                </span>

                                <?php if($item->getCountRating() > 0): ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->getAverageRating()); ?>"></div>
                                            <address class="mt-1">
                                                <?php if($item->getCountRating() == 1): ?>
                                                    <span><?php echo e('(' . $item->getCountRating() . ' ' . __('review.frontend.review') . ')'); ?></span>
                                                <?php else: ?>
                                                    <span><?php echo e('(' . $item->getCountRating() . ' ' . __('review.frontend.reviews') . ')'); ?></span>
                                                <?php endif; ?>
                                            </address>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row mt-1 align-items-center">
                                    <div class="col-2 pr-0">
                                        <?php if(empty($item->user->user_image)): ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                        <?php else: ?>

                                            <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>" class="img-fluid rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-10 line-height-1-2">

                                        <div class="row pb-1">
                                            <div class="col-12">
                                                <span class="font-size-13"><?php echo e($item->user->name); ?></span>
                                            </div>
                                        </div>
                                        <div class="row line-height-1-0">
                                            <div class="col-12">
                                                <?php if($item->totalComments() > 1): ?>
                                                    <span class="review"><?php echo e($item->totalComments() . ' comments'); ?></span>
                                                <?php elseif($item->totalComments() == 1): ?>
                                                    <span class="review"><?php echo e($item->totalComments() . ' comment'); ?></span>
                                                <?php endif; ?>
                                                <span class="review"><?php echo e($item->created_at->diffForHumans()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.recent-listings')); ?></h2>
            </div>
        </div>
        <div class="row mt-5">

            <?php if(count($latest_items)): ?>
                <?php $__currentLoopData = $latest_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                        <div class="d-block d-md-flex listing">
                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.webp'))); ?>)"></a>
                            <div class="lh-content">

                                <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                        <span class="category"><?php echo e($category->category_name); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($item->allCategories()->count() > \App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE): ?>
                                    <span class="category"><?php echo e(__('categories.and') . " " . strval($item->allCategories()->count() - \App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE) . " " . __('categories.more')); ?></span>
                                <?php endif; ?>

                                <h3 class="pt-2"><a href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a></h3>
                                <address>
                                    <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
                                    <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
                                </address>

                                <?php if($item->getCountRating() > 0): ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="pl-0 rating_stars rating_stars_<?php echo e($item->item_slug); ?>" data-id="rating_stars_<?php echo e($item->item_slug); ?>" data-rating="<?php echo e($item->getAverageRating()); ?>"></div>
                                            <address class="mt-1">
                                                <?php if($item->getCountRating() == 1): ?>
                                                    <?php echo e('(' . $item->getCountRating() . ' ' . __('review.frontend.review') . ')'); ?>

                                                <?php else: ?>
                                                    <?php echo e('(' . $item->getCountRating() . ' ' . __('review.frontend.reviews') . ')'); ?>

                                                <?php endif; ?>
                                            </address>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row align-items-center">
                                    <div class="col-2 pr-0">
                                        <?php if(empty($item->user->user_image)): ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($item->user->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid rounded-circle">
                                        <?php else: ?>

                                            <img src="<?php echo e(Storage::disk('public')->url('user/' . $item->user->user_image)); ?>" alt="<?php echo e($item->user->name); ?>" class="img-fluid rounded-circle">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-10 line-height-1-2">

                                        <div class="row pb-1">
                                            <div class="col-12">
                                                <span class="font-size-13"><?php echo e($item->user->name); ?></span>
                                            </div>
                                        </div>
                                        <div class="row line-height-1-0">
                                            <div class="col-12">
                                                <?php if($item->totalComments() > 1): ?>
                                                    <span class="review"><?php echo e($item->totalComments() . ' comments'); ?></span>
                                                <?php elseif($item->totalComments() == 1): ?>
                                                    <span class="review"><?php echo e($item->totalComments() . ' comment'); ?></span>
                                                <?php endif; ?>
                                                <span class="review"><?php echo e($item->created_at->diffForHumans()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="<?php echo e(route('page.categories')); ?>" class="btn btn-primary rounded text-white">
                    <?php echo e(__('all_latest_listings.view-all-latest')); ?>

                </a>
            </div>
        </div>
    </div>
</div>

<?php if(count($all_testimonials)): ?>
<div class="site-section bg-white">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.testimonials')); ?></h2>
            </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">

                <?php $__currentLoopData = $all_testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="testimonial">
                            <figure class="mb-4">
                                <?php if(empty($testimonial->testimonial_image)): ?>
                                    <img src="<?php echo e(asset('frontend/images/placeholder/profile-'. intval($testimonial->id % 10) . '.webp')); ?>" alt="Image" class="img-fluid mb-3">
                                <?php else: ?>
                                    <img src="<?php echo e(Storage::disk('public')->url('testimonial/' . $testimonial->testimonial_image)); ?>" alt="Image" class="img-fluid mb-3">
                                <?php endif; ?>
                                <p>
                                    <?php echo e($testimonial->testimonial_name); ?>

                                    <?php if($testimonial->testimonial_job_title): ?>
                                        <?php echo e('• ' . $testimonial->testimonial_job_title); ?>

                                    <?php endif; ?>
                                    <?php if($testimonial->testimonial_company): ?>
                                        <?php echo e('of ' . $testimonial->testimonial_company); ?>

                                    <?php endif; ?>
                                </p>
                            </figure>
                            <blockquote>
                                <p><?php echo e($testimonial->testimonial_description); ?></p>
                            </blockquote>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php endif; ?>


<?php if(count($recent_blog)): ?>
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.homepage.our-blog')); ?></h2>
                <p class="color-black-opacity-5"><?php echo e(__('frontend.homepage.our-blog-decr')); ?></p>
            </div>
        </div>
        <div class="row mb-3 align-items-stretch">

                <?php $__currentLoopData = $recent_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                        <div class="h-entry">
                            <?php if(empty($post->featured_image)): ?>
                                <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url(<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_medium.webp')); ?>);background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                            <?php else: ?>
                                <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url(<?php echo e(url('laravel_project/public' . $post->featured_image)); ?>);background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
                            <?php endif; ?>
                            <h2 class="font-size-regular"><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>" class="text-black"><?php echo e($post->title); ?></a></h2>
                            <div class="meta mb-3">
                                by <?php echo e($post->user()->get()->first()->name); ?><span class="mx-1">&bullet;</span> <?php echo e($post->updated_at->diffForHumans()); ?> <span class="mx-1">&bullet;</span>
                                <?php if($post->topic()->get()->count() != 0): ?>
                                <a href="<?php echo e(route('page.blog.topic', $post->topic()->get()->first()->slug)); ?>"><?php echo e($post->topic()->get()->first()->name); ?></a>
                                <?php else: ?>
                                    <?php echo e(__('frontend.blog.uncategorized')); ?>

                                <?php endif; ?>

                            </div>
                            <p><?php echo e(str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200)); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-12 text-center mt-4">
                <a href="<?php echo e(route('page.blog')); ?>" class="btn btn-primary rounded py-2 px-4 text-white"><?php echo e(__('frontend.homepage.all-posts')); ?></a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
    <!-- Youtube Background for Header -->
    <script src="<?php echo e(asset('frontend/vendor/jquery-youtube-background/jquery.youtube-background.js')); ?>"></script>
    <?php endif; ?>

    <script>
        $(document).ready(function(){

            /**
             * Start get user lat & lng location
             */
            function success(position) {
                const latitude  = position.coords.latitude;
                const longitude = position.coords.longitude;

                console.log("Latitude: " + latitude + ", Longitude: " + longitude);

                var ajax_url = '/ajax/location/save/' + latitude + '/' + longitude;

                console.log(ajax_url);

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
                    }});
            }

            function error() {
                console.log("Unable to retrieve your location");
            }

            if(!navigator.geolocation) {

                console.log("Geolocation is not supported by your browser");
            } else {

                console.log("Locating ...");
                navigator.geolocation.getCurrentPosition(success, error);
            }
            /**
             * End get user lat & lng location
             */


            <?php if($site_homepage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/index.blade.php ENDPATH**/ ?>