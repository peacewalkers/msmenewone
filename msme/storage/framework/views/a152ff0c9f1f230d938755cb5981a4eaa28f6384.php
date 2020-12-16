<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>







        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1  ><?php echo e(__('frontend.state.title', ['state_name' => $state->state_name])); ?></h1>
                            <p class="mb-0"  ><?php echo e(__('frontend.state.description')); ?></p>
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



        <div class="row mb-5">
            <div class="col-md-12 text-left border-primary">
                <h2 class="font-weight-light text-primary"><?php echo e($category->category_name); ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">


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



            </div>
            <div class="col-lg-3 ml-auto">

                <div class="pt-3">



                    <?php echo $__env->make('frontend.partials.search.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                </div>

            </div>

        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/state.blade.php ENDPATH**/ ?>