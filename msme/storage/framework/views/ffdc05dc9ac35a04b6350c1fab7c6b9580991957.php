<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/css/plan-details.css')); ?>" rel="stylesheet">
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

    <div class="row justify-content-between mt-5">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">Listing Subscriptions</h1>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('user.subscriptions.edit', $subscription->id)); ?>" class="btn btn-info btn-icon-split">

                <span class="text">Buy Premium Listings</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row mb-4">
                <div class="col-6">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span class="text-gray-800"><?php echo e(__('backend.plan.plan-info')); ?></span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                            <span> Plan Name:
                                </span>
                        </div>
                        <div class="col-8">
                            <span> <?php echo e($subscription->plan->plan_name); ?></span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                            <span> Plan Type:</span>
                        </div>
                        <div class="col-8">
                            <?php if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                <span>Free Plan</span>
                            <?php else: ?>
                                <span> <?php echo e(__('backend.plan.paid-plan')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                           <span>  <?php echo e(__('backend.plan.features')); ?>:</span>
                        </div>
                        <div class="col-8">
                            <span>   <?php echo e($subscription->plan->plan_features); ?></span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                           <span>  <?php echo e(__('backend.plan.price')); ?>:</span>
                        </div>
                        <div class="col-8">
                            <span>  <?php echo e($subscription->plan->plan_price); ?></span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-4">
                           <span>  <?php echo e(__('backend.plan.period')); ?>:</span>
                        </div>
                        <div class="col-8">
                            <?php if($subscription->plan->plan_period == \App\Plan::PLAN_LIFETIME): ?>
                                <span>  <?php echo e(__('backend.plan.lifetime')); ?></span>
                            <?php elseif($subscription->plan->plan_period == \App\Plan::PLAN_MONTHLY): ?>
                                        <span>   <?php echo e(__('backend.plan.monthly')); ?></span>
                            <?php elseif($subscription->plan->plan_period == \App\Plan::PLAN_QUARTERLY): ?>
                                                <span>  <?php echo e(__('backend.plan.quarterly')); ?></span>
                            <?php elseif($subscription->plan->plan_period == \App\Plan::PLAN_YEARLY): ?>
                                                        <span>   <?php echo e(__('backend.plan.yearly')); ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span class="text-gray-800"><?php echo e(__('backend.subscription.subscription')); ?></span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-5">
                          <span>  <?php echo e(__('backend.plan.maximum-featured-listing')); ?>: </span>
                        </div>
                        <div class="col-7">
                            <span>  <?php echo e($subscription->subscription_max_featured_listing >= 0 ? $subscription->subscription_max_featured_listing : __('backend.plan.unlimited')); ?> </span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-5">
                            <span><?php echo e(__('backend.subscription.started-at')); ?>: </span>
                        </div>
                        <div class="col-7">
                            <span><?php echo e($subscription->subscription_start_date); ?> </span>
                        </div>
                    </div>
                    <div class="row plan-head">
                        <div class="col-5">
                            <span><?php echo e(__('backend.subscription.end-at')); ?>: </span>
                        </div>
                        <div class="col-7">
                            <span> <?php echo e($subscription->subscription_end_date); ?> </span>
                        </div>
                    </div>
                    <?php if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                    <div class="row mt-3">
                        <div class="col-12">

                            <?php if($subscription->subscription_pay_method == \App\Subscription::PAY_METHOD_RAZORPAY): ?>
                                <form method="POST" action="<?php echo e(route('user.razorpay.recurring.cancel')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="subscription_id" value="<?php echo e($subscription->id); ?>">
                                    <button type="submit" class="btn btn-danger text-white">
                                        <?php echo e(__('backend.subscription.cancel-subscription')); ?>

                                    </button>
                                    <small class="form-text text-muted">
                                        <?php echo e(__('backend.subscription.cancel-subscription-help')); ?>

                                    </small>
                                </form>
                            <?php elseif($subscription->subscription_pay_method == \App\Subscription::PAY_METHOD_STRIPE): ?>
                                <form method="POST" action="<?php echo e(route('user.stripe.recurring.cancel')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="subscription_id" value="<?php echo e($subscription->id); ?>">
                                    <button type="submit" class="btn btn-danger text-white">
                                        <?php echo e(__('backend.subscription.cancel-subscription')); ?>

                                    </button>
                                    <small class="form-text text-muted">
                                        <?php echo e(__('backend.subscription.cancel-subscription-help')); ?>

                                    </small>
                                </form>
                            <?php elseif($subscription->subscription_pay_method == \App\Subscription::PAY_METHOD_BANK_TRANSFER): ?>
                                <form method="POST" action="<?php echo e(route('user.banktransfer.recurring.cancel')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="subscription_id" value="<?php echo e($subscription->id); ?>">
                                    <button type="submit" class="btn btn-danger text-white">
                                        <?php echo e(__('backend.subscription.cancel-subscription')); ?>

                                    </button>
                                    <small class="form-text text-muted">
                                        <?php echo e(__('backend.subscription.cancel-subscription-help')); ?>

                                    </small>
                                </form>
                            <?php else: ?>
                                <form method="POST" action="<?php echo e(route('user.paypal.recurring.cancel')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="subscription_id" value="<?php echo e($subscription->id); ?>">
                                    <button type="submit" class="btn btn-danger text-white">
                                        <?php echo e(__('backend.subscription.cancel-subscription')); ?>

                                    </button>
                                    <small class="form-text text-muted">
                                        <?php echo e(__('backend.subscription.cancel-subscription-help')); ?>

                                    </small>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <hr/>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-12">
                            <span class="text-gray-800">Invoices</span>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('backend.subscription.invoice-num')); ?></th>
                                            <th><?php echo e(__('backend.subscription.title')); ?></th>
                                            <th><?php echo e(__('backend.subscription.description')); ?></th>
                                            <th><?php echo e(__('backend.subscription.amount')); ?></th>
                                            <th><?php echo e(__('backend.subscription.status')); ?></th>
                                            <th><?php echo e(__('backend.subscription.date')); ?></th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th><?php echo e(__('backend.subscription.invoice-num')); ?></th>
                                            <th><?php echo e(__('backend.subscription.title')); ?></th>
                                            <th><?php echo e(__('backend.subscription.description')); ?></th>
                                            <th><?php echo e(__('backend.subscription.amount')); ?></th>
                                            <th><?php echo e(__('backend.subscription.status')); ?></th>
                                            <th><?php echo e(__('backend.subscription.date')); ?></th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($invoice->invoice_num); ?></td>
                                                <td><?php echo e($invoice->invoice_item_title); ?></td>
                                                <td><?php echo e($invoice->invoice_item_description); ?></td>
                                                <td><?php echo e($invoice->invoice_amount); ?></td>
                                                <td><?php echo e($invoice->invoice_status); ?></td>
                                                <td><?php echo e($invoice->created_at); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('backend/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/subscription/index.blade.php ENDPATH**/ ?>