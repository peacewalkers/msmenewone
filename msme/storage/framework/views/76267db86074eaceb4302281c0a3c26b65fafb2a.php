<?php $__env->startSection('styles'); ?>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>
    <link href="<?php echo e(asset('frontend/vendor/leaflet/leaflet.css')); ?>" rel="stylesheet" />
    <?php endif; ?>

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
                            <h1 style="color: <?php echo e($site_innerpage_header_title_font_color); ?>;"><?php echo e(__('frontend.categories.title')); ?></h1>
                            <p class="mb-0" style="color: <?php echo e($site_innerpage_header_paragraph_font_color); ?>;"><?php echo e(__('frontend.categories.description')); ?></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">


            <?php if($categories->count() > 0): ?>
                <div class="overlap-category mb-5">

                    <div class="row align-items-stretch no-gutters">
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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('frontend.item.all-categories')); ?></li>
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

            <div class="row">

                <div class="col-lg-2">
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

                    <h3 class="h5 text-black mb-3"><?php echo e(__('listings_filter.filters')); ?></h3>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <form method="GET" action="<?php echo e(route('page.categories')); ?>">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="filter_categories" class="text-black"><?php echo e(__('listings_filter.categories')); ?></label>

                                        <?php $__currentLoopData = $all_printable_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_printable_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check filter_category_div">
                                                <input <?php echo e(in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : ''); ?> name="filter_categories[]" class="form-check-input" type="checkbox" value="<?php echo e($all_printable_category['category_id']); ?>" id="filter_categories_<?php echo e($all_printable_category['category_id']); ?>">
                                                <label class="form-check-label" for="filter_categories_<?php echo e($all_printable_category['category_id']); ?>">
                                                    <?php echo e($all_printable_category['category_name']); ?>

                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <a href="javascript:;" class="show_more"><?php echo e(__('listings_filter.show-more')); ?></a>
                                        <?php $__errorArgs = ['filter_categories'];
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
                                        <label class="text-black" for="filter_sort_by"><?php echo e(__('listings_filter.sort-by')); ?></label>
                                        <select class="custom-select <?php $__errorArgs = ['filter_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filter_sort_by" id="filter_sort_by">
                                            <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_NEWEST); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-newest')); ?></option>
                                            <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_OLDEST); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-oldest')); ?></option>
                                            <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_HIGHEST); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-highest')); ?></option>
                                            <option value="<?php echo e(\App\Item::ITEMS_SORT_BY_LOWEST); ?>" <?php echo e($filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST ? 'selected' : ''); ?>><?php echo e(__('listings_filter.sort-by-lowest')); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['filter_sort_by'];
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
                                        <button type="submit" class="btn btn-primary btn-block text-white rounded">
                                            <?php echo e(__('listings_filter.update-result')); ?>

                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

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

                <div class="col-lg-6">

                    <div class="row mb-5">
                        <div class="col-md-12 text-left border-primary">
                            <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.categories.sub-title-1')); ?></h2>
                        </div>
                    </div>

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

                <div class="col-lg-4">
                    <div class="sticky-top" id="mapid-box"></div>
                </div>

            </div>

        </div>
    </div>

    <?php if(count($all_states)): ?>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-7 text-left border-primary">
                        <h2 class="font-weight-light text-primary"><?php echo e(__('frontend.categories.sub-title-2')); ?></h2>
                    </div>
                </div>
                <div class="row mt-5">

                    <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <a href="<?php echo e(route('page.state', ['state_slug' => $state->state_slug])); ?>"><?php echo e($state->state_name); ?></a>
                            (<?php echo e($state->items_count); ?>)
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

            /**
             * Start initial map box with OpenStreetMap
             */
            <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP): ?>

                <?php if(count($paid_items) || count($free_items)): ?>

                var window_height = $(window).height();
                $('#mapid-box').css('height', window_height + 'px');

                var map = L.map('mapid-box', {
                    zoom: 15,
                    scrollWheelZoom: true,
                });

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var bounds = [];
                <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paid_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                bounds.push([ <?php echo e($paid_item->item_lat); ?>, <?php echo e($paid_item->item_lng); ?> ]);
                var marker = L.marker([<?php echo e($paid_item->item_lat); ?>, <?php echo e($paid_item->item_lng); ?>]).addTo(map);

                <?php if($paid_item->item_address_hide): ?>
                marker.bindPopup("<?php echo e($paid_item->item_title . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code); ?>");
                <?php else: ?>
                marker.bindPopup("<?php echo e($paid_item->item_title . ', ' . $paid_item->item_address . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code); ?>");
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $free_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                bounds.push([ <?php echo e($free_item->item_lat); ?>, <?php echo e($free_item->item_lng); ?> ]);
                var marker = L.marker([<?php echo e($free_item->item_lat); ?>, <?php echo e($free_item->item_lng); ?>]).addTo(map);

                <?php if($free_item->item_address_hide): ?>
                marker.bindPopup("<?php echo e($free_item->item_title . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code); ?>");
                <?php else: ?>
                marker.bindPopup("<?php echo e($free_item->item_title . ', ' . $free_item->item_address . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code); ?>");
                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                map.fitBounds(bounds);

                <?php endif; ?>

            <?php endif; ?>
            /**
             * End initial map box with OpenStreetMap
             */

            /**
             * Start show more/less
             */
            //this will execute on page load(to be more specific when document ready event occurs)
            if ($(".filter_category_div").length > 5)
            {
                $(".filter_category_div:gt(5)").hide();
                $(".show_more").show();
            }

            $(".show_more").on('click', function() {
                //toggle elements with class .ty-compact-list that their index is bigger than 2
                $(".filter_category_div:gt(5)").toggle();
                //change text of show more element just for demonstration purposes to this demo
                $(this).text() === "<?php echo e(__('listings_filter.show-more')); ?>" ? $(this).text("<?php echo e(__('listings_filter.show-less')); ?>") : $(this).text("<?php echo e(__('listings_filter.show-more')); ?>");
            });
            /**
             * End show more/less
             */

        });

    </script>

    <?php if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP): ?>
        <script>
            // Initial the google map
            function initMap() {

                <?php if(count($paid_items) || count($free_items)): ?>

                var window_height = $(window).height();
                $('#mapid-box').css('height', window_height + 'px');

                var locations = [];

                <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paid_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    locations.push([ '<?php echo e($paid_item->item_title); ?>', <?php echo e($paid_item->item_lat); ?>, <?php echo e($paid_item->item_lng); ?> ]);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $free_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    locations.push([ '<?php echo e($free_item->item_title); ?>', <?php echo e($free_item->item_lat); ?>, <?php echo e($free_item->item_lng); ?> ]);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                var map = new google.maps.Map(document.getElementById('mapid-box'), {
                    zoom: 12,
                    //center: new google.maps.LatLng(-33.92, 151.25),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                //create empty LatLngBounds object
                var bounds = new google.maps.LatLngBounds();
                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                    });

                    //extend the bounds to include each marker's position
                    bounds.extend(marker.position);

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

                //now fit the map to the newly inclusive bounds
                map.fitBounds(bounds);

                //(optional) restore the zoom level after the map is done scaling
                // var listener = google.maps.event.addListener(map, "idle", function () {
                //     map.setZoom(5);
                //     google.maps.event.removeListener(listener);
                // });

                <?php endif; ?>
            }

        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key=<?php echo e($site_global_settings->setting_site_map_google_api_key); ?>&callback=initMap"></script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/categories.blade.php ENDPATH**/ ?>