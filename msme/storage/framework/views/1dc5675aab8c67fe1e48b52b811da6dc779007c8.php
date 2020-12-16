<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($paid_subscription_days_left == 1): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo e(__('backend.subscription.subscription-end-soon-day')); ?>

        </div>
    <?php elseif($paid_subscription_days_left > 1 && $paid_subscription_days_left <= \App\Subscription::PAID_SUBSCRIPTION_LEFT_DAYS): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo e(__('backend.subscription.subscription-end-soon-days', ['days_left' => $paid_subscription_days_left])); ?>

        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <div class="mt-4 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0 text-gray-800"><?php echo e(__('backend.homepage.dashboard')); ?></h3>
        <a href="<?php echo e(route('user.items.create')); ?>" class="btn btn-info btn-icon-split">
            <span class="text">List Your Business</span>
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo e(__('backend.homepage.pending-listings')); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($pending_item_count); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo e(__('backend.homepage.all-listings')); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($item_count); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo e(__('backend.homepage.all-messages')); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($message_count); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo e(__('backend.homepage.all-comments')); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($comment_count); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('backend.homepage.message')); ?></h6>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $recent_threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row pt-2 pb-2 <?php echo e($key%2 == 0 ? 'bg-light' : ''); ?>">
                            <div class="col-9">
                                <span><?php echo e($thread->latestMessage->body); ?></span>
                            </div>
                            <div class="col-3 text-right">
                                <span><?php echo e($thread->latestMessage->created_at->diffForHumans()); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row text-center mt-3">
                        <div class="col-12">
                            <a href="<?php echo e(route('user.messages.index')); ?>"><?php echo e(__('backend.homepage.view-all-message')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('backend.homepage.comment')); ?></h6>
                </div>
                <div class="card-body">

                    <?php $__currentLoopData = $recent_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row pt-2 pb-2 <?php echo e($key%2 == 0 ? 'bg-light' : ''); ?>">
                            <div class="col-9">
                                <span><?php echo e($comment->comment); ?></span>
                            </div>
                            <div class="col-3 text-right">
                                <span><?php echo e($comment->created_at->diffForHumans()); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="row text-center mt-3">
                        <div class="col-12">
                            <a href="<?php echo e(route('user.comments.index')); ?>"><?php echo e(__('backend.homepage.view-all-comment')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/index.blade.php ENDPATH**/ ?>