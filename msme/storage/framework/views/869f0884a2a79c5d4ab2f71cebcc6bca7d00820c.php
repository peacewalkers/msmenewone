<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(asset('frontend/images/placeholder/header-inner.webp')); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-color: <?php echo e($site_innerpage_header_background_color); ?>;" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url( <?php echo e(Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image)); ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

    <?php elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
        <div class="site-blocks-cover inner-page-cover overlay" style="background-color: #333333;" data-aos="fade" data-stellar-background-ratio="0.5">
    <?php endif; ?>



        <?php if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO): ?>
            <div data-youtube="<?php echo e($site_innerpage_header_background_youtube_video); ?>"></div>
        <?php endif; ?>

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e($category->category_name); ?></h1>
                            <p class="mb-0" style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e($category->category_description); ?></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">


            <?php if($children_categories->count() > 0): ?>
            <div class="overlap-category mb-5">

                <div class="row align-items-stretch no-gutters">
                    <?php $__currentLoopData = $children_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $children_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="<?php echo e(route('page.category', $children_category->category_slug)); ?>" class="popular-category h-100">

                                <?php if($children_category->category_icon): ?>
                                    <span class="icon"><span><i class="<?php echo e($children_category->category_icon); ?>"></i></span></span>
                                <?php else: ?>
                                    <span class="icon"><span><i class="fas fa-heart"></i></span></span>
                                <?php endif; ?>

                                <span class="caption mb-2 d-block"><?php echo e($children_category->category_name); ?></span>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>


            <?php if($ads_before_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_before_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_breadcrumb_key => $ad_before_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-5">
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

            <div class="row mb-4">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.home')); ?>"><?php echo e(__('frontend.shared.home')); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.item.all-categories')); ?></a></li>
                            <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('page.category', $parent_category->category_slug)); ?>"><?php echo e($parent_category->category_name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($category->category_name); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php if($ads_after_breadcrumb->count() > 0): ?>
                <?php $__currentLoopData = $ads_after_breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_breadcrumb_key => $ad_after_breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mb-5">
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

            <div class="row mb-5">
                <div class="col-md-12 text-left border-primary">
                    <h2 class="font-weight-light text-primary"><?php echo e($category->category_name); ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <?php if($ads_before_content->count() > 0): ?>
                        <?php $__currentLoopData = $ads_before_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_before_content_key => $ad_before_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mb-5">
                                <?php if($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                    <div class="col-12 text-left">
                                        <div>
                                            <?php echo $ad_before_content->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                    <div class="col-12 text-center">
                                        <div>
                                            <?php echo $ad_before_content->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                    <div class="col-12 text-right">
                                        <div>
                                            <?php echo $ad_before_content->advertisement_code; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="row">

                        <?php if(count($paid_items)): ?>
                            <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6">
                                    <?php echo $__env->make('frontend.partials.paid-item-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if(count($free_items)): ?>
                                <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <?php echo $__env->make('frontend.partials.free-item-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>

                    <div class="row">
                        <div class="col-12">

                            <?php echo e($pagination->links()); ?>


                        </div>
                    </div>

                        <?php if($ads_after_content->count() > 0): ?>
                            <?php $__currentLoopData = $ads_after_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ads_after_content_key => $ad_after_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mt-5">
                                    <?php if($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT): ?>
                                        <div class="col-12 text-left">
                                            <div>
                                                <?php echo $ad_after_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER): ?>
                                        <div class="col-12 text-center">
                                            <div>
                                                <?php echo $ad_after_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT): ?>
                                        <div class="col-12 text-right">
                                            <div>
                                                <?php echo $ad_after_content->advertisement_code; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <?php if(count($all_states)): ?>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 text-left border-primary">
                    <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.category.sub-title-2', ['category_name' => $category->category_name])); ?></h2>
                </div>
            </div>
            <div class="row mt-5">

                <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                        <a href="<?php echo e(route('page.category.state', ['category_slug' => $category->category_slug, 'state_slug' => $state->state_slug])); ?>"><?php echo e($state->state_name); ?> <?php echo e($category->category_name); ?></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/category.blade.php ENDPATH**/ ?>