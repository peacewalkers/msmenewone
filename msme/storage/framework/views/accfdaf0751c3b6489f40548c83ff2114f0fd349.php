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
                <li class="breadcrumb-item"><a href="<?php echo e(route('page.home')); ?>"><?php echo e(__('frontend.shared.home')); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('page.categories')); ?>"><?php echo e(__('frontend.item.all-categories')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('frontend.search.title-search')); ?></li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Filter Category</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="Search">

                            <button type="submit"><i class="icon-magnifier"></i></button>

                        </form>

                        <figure class="ps-custom-scrollbar" data-height="250">
                            
                        </figure>

                        
                        <div class="row form-group">
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
                                        <li><a href="javascript:void(0)"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        <?php if(isset($items)): ?>
                                            <?php if(count($items)): ?>
                                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php else: ?>
                                                <div class="col-12">
                                                    <p><?php echo e(__('frontend.shared.no-listing')); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>


                                    </div>
                                </div>

                                <div class="row">
                                    <?php if(isset($items)): ?>
                                        <?php if(count($items)): ?>
                                            <?php echo e($items->links()); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                          
                        </div>
                    </div>
                </div>
            </div>
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

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/search.blade.php ENDPATH**/ ?>