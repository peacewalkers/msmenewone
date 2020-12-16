<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <header class="header header--mobile header--mobile-categories" data-sticky="true">
        <div class="header__filter">
            <button class="ps-shop__filter-mb" id="filter-sidebar">
                <i class="icon-equalizer"></i><span>Filter</span></button>

        </div>
    </header>

    <div class="ps-breadcrumb mb-5">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>All Categories</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Filter Category</h4>

                        <figure class="ps-custom-scrollbar mb-5" data-height="250">

                         <form method="GET" action="<?php echo e(route('page.categories')); ?>">

                            <?php $__currentLoopData = $all_printable_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_printable_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ps-checkbox ">
                                    <input <?php echo e(in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : ''); ?> name="filter_categories[]" class="form-control " type="checkbox" value="<?php echo e($all_printable_category['category_id']); ?>" id="filter_categories_<?php echo e($all_printable_category['category_name']); ?>">
                                    <label class="form-check-label" for="filter_categories_<?php echo e($all_printable_category['category_name']); ?>">
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

                        </figure>

                        <select class="ps-select <?php $__errorArgs = ['filter_sort_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-placeholder="Sort Items" name="filter_sort_by" id="filter_sort_by">
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

                        <div class="row form-group mt-5">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block text-white rounded">
                                    Apply
                                </button>
                            </div>
                        </div>
                        </form>
                    </aside>
                </div>

                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p> </p>
                            <div class="ps-shopping__actions">


                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        <?php if(count($paid_items)): ?>
                                            <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                    <div class="ps-product text-center">
                                                        <div class="ps-product__thumbnail">
                                                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                                                <img src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg'))); ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__container">
                                                            <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOME, isset($parent_category_id) ? $parent_category_id : null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                                    <span class="category"><?php echo e($category->category_name); ?></span>
                                                                </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="">
                                                                <a class="ps-product__title" href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                            <?php if(count($free_items)): ?>
                                                <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                        <div class="ps-product text-center">
                                                            <div class="ps-product__thumbnail">
                                                                <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                                                    <img src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg'))); ?>" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="ps-product__container">
                                                                <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOME, isset($parent_category_id) ? $parent_category_id : null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                                        <span class="category"><?php echo e($category->category_name); ?></span>
                                                                    </a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="">
                                                                    <a class="ps-product__title" href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </div>
                                </div>

                                <div class="ps-pagination">
                                    <?php echo e($pagination->links()); ?>

                                </div>
                            </div>

                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                    <?php if(count($paid_items)): ?>
                                        <?php $__currentLoopData = $paid_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="ps-product ps-product--wide text-center">
                                        <div class="ps-product__thumbnail">
                                            <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                                <img src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg'))); ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"  >
                                                <a class="ps-product__title" href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a>
                                                <p class="ps-product__vendor" >                                                <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                        <span class="category"><?php echo e($category->category_name); ?></span>
                                                    </a>
                                                </p>
                                                    <p> <?php echo e($item->item_description); ?> </p>

                                            </div>

                                            <div class="ps-product__shopping">
                                                <a class="ps-btn" href="<?php echo e(route('page.item', $item->item_slug)); ?>">Contact Vendor</a>
                                            </div>
                                        </div>
                                    </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                        <?php if(count($free_items)): ?>
                                            <?php $__currentLoopData = $free_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="ps-product ps-product--wide text-center">
                                                    <div class="ps-product__thumbnail">
                                                        <a href="<?php echo e(route('page.item', $item->item_slug)); ?>">
                                                            <img src="<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg'))); ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="ps-product__container">
                                                    <div class="ps-product__content" >
                                                            <a class="ps-product__title" href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a>
                                                            <p class="ps-product__vendor">                                                <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                                                                    <span class="category"><?php echo e($category->category_name); ?></span>
                                                                </a>
                                                            </p>

                                                                <p> <?php echo e($item->item_description); ?> </p>
                                                        </div>

                                                        <div class="ps-product__shopping">
                                                            <a class="ps-btn" href="<?php echo e(route('page.item', $item->item_slug)); ?>">Contact Vendor</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </div>


                                <div class="ps-pagination">
                                    <?php echo e($pagination->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-newsletter">
        <div class="container">
            <form class="ps-form--newsletter" action="do_action" method="post">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>Newsletter</h3>
                            <p>Subcribe to get information about products and coupons</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input class="form-control" type="email" placeholder="Email address">
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('msmefooters'); ?>

<?php $__env->stopSection(); ?>
<div class="ps-filter--sidebar">
    <div class="ps-filter__header">
        <h3>Filter Products</h3><a class="ps-btn--close ps-btn--no-boder" href="#"></a>
    </div>

    <div class="ps-filter__content">

        <aside class="widget widget_shop">
            <h4 class="widget-title">Categories</h4>
            <form class="ps-form--widget-search" action="<?php echo e(route('page.categories')); ?>" method="GET">

            <figure class="ps-custom-scrollbar" data-height="250">
                <?php $__currentLoopData = $all_printable_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_printable_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-control  form-check filter_category_div">
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

            </figure>
                <div class="row form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block text-white rounded">
                            <?php echo e(__('listings_filter.update-result')); ?>

                        </button>
                    </div>
                </div>
            </form>

        </aside>
    </div>
</div>
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div>

<?php $__env->startSection('msmescripts'); ?>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>

        $(document).ready(function(){

            /**
             * Start initial map box
             */
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
            /**
             * End initial map box
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/categories.blade.php ENDPATH**/ ?>