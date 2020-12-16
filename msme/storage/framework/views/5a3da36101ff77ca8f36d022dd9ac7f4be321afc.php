<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('msmelist')); ?>/css/pricing.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between mt-5">
        <div class="col-9">

        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('user.subscriptions.index')); ?>" class="btn btn-info btn-icon-split">
                <span class="text">Go Back</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <?php if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(__('backend.subscription.switch-plan-help')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

                <section class="pricing-tables content-area">
                    <div class="container">
                        <!-- Main title -->
                        <div class="main-title text-center">
                            <p>Upgrade your Listings</p>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $all_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-12 col-lg-4 col-md-4">
                                    <div class="pricing">
                                        <div class="price-header">
                                            <div class="title"><?php echo e($plan->plan_name); ?></div>
                                            <div class="price"><span> ₹ </span><?php echo e($plan->plan_price); ?></div>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>Featured Listings: <?php echo e(empty($plan->plan_max_featured_listing) ? __('backend.plan.unlimited') : $plan->plan_max_featured_listing); ?></li>
                                                <li>
                                                    <?php if($plan->plan_period == \App\Plan::PLAN_LIFETIME): ?>
                                                        Listing Duration: <?php echo e(__('backend.plan.lifetime')); ?>

                                                    <?php elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY): ?>
                                                        Listing Duration: <?php echo e(__('backend.plan.monthly')); ?>

                                                    <?php elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY): ?>
                                                        Listing Duration: <?php echo e(__('backend.plan.quarterly')); ?>

                                                    <?php elseif($plan->plan_period == \App\Plan::PLAN_YEARLY): ?>
                                                        Listing Duration: <?php echo e(__('backend.plan.yearly')); ?>

                                                    <?php endif; ?>
                                                </li>
                                                <li>Plan Details: </li>
                                            </ul>
                                            <div class="button">
                                                <form method="POST" action="<?php echo e(route('user.razorpay.checkout.do', ['plan_id'=>$plan->id, 'subscription_id'=>$subscription->id])); ?>" class="">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn btn-outline pricing-btn"  <?php echo e($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID ? 'disabled' : ''); ?>>Upgrade Now </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            <?php if($setting_site_bank_transfer_enable == \App\Setting::SITE_PAYMENT_BANK_TRANSFER_ENABLE): ?>

            $(".bank_transfer_tab").on('shown.bs.tab', function (e) {
                e.target // newly activated tab
                e.relatedTarget // previous active tab

                var data_input_id = $(e.target).attr("data-input-id");

                $("#" + data_input_id).val(e.target.text);
            });

            <?php endif; ?>

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/subscription/edit.blade.php ENDPATH**/ ?>