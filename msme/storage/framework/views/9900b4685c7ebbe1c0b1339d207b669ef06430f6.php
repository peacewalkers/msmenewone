<div class="d-block d-md-flex listing vertical">

    <a href="<?php echo e(route('page.item', $item->item_slug)); ?>" class="img d-block" style="background-image: url(<?php echo e(!empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.webp'))); ?>)">
        <span class="bg-success text-white pl-1 pr-1 pt-1 pb-1 m-0 item-featured-label"><?php echo e(__('frontend.item.featured')); ?></span>
    </a>
    <div class="lh-content">

        <?php $__currentLoopData = $item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY, isset($parent_category_id) ? $parent_category_id : null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('page.category', $category->category_slug)); ?>">
                <span class="category"><?php echo e($category->category_name); ?></span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($item->allCategories()->count() > \App\Item::ITEM_TOTAL_SHOW_CATEGORY): ?>
            <span class="category"><?php echo e(__('categories.and') . " " . strval($item->allCategories()->count() - \App\Item::ITEM_TOTAL_SHOW_CATEGORY) . " " . __('categories.more')); ?></span>
        <?php endif; ?>


        <?php if(!empty($item->item_price)): ?>
            <span class="category">$<?php echo e(number_format($item->item_price)); ?></span>
        <?php endif; ?>

        <h3 class="pt-2"><a href="<?php echo e(route('page.item', $item->item_slug)); ?>"><?php echo e($item->item_title); ?></a></h3>
        <address>
            <?php echo e($item->item_address_hide == 0 ? $item->item_address . ',' : ''); ?>

            <a href="<?php echo e(route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug])); ?>"><?php echo e($item->city->city_name); ?></a>,
            <a href="<?php echo e(route('page.state', ['state_slug'=>$item->state->state_slug])); ?>"><?php echo e($item->state->state_name); ?></a>
            <?php echo e($item->item_postal_code); ?>

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
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/partials/paid-item-block.blade.php ENDPATH**/ ?>