<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.subscription.subscription')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.subscription.subscription-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><?php echo e(__('backend.subscription.id')); ?></th>
                                <th><?php echo e(__('backend.subscription.type')); ?></th>
                                <th><?php echo e(__('backend.subscription.price')); ?></th>
                                <th><?php echo e(__('backend.subscription.cycle')); ?></th>
                                <th><?php echo e(__('backend.subscription.name')); ?></th>
                                <th><?php echo e(__('backend.subscription.start')); ?></th>
                                <th><?php echo e(__('backend.subscription.end')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.subscription.id')); ?></th>
                                <th><?php echo e(__('backend.subscription.type')); ?></th>
                                <th><?php echo e(__('backend.subscription.price')); ?></th>
                                <th><?php echo e(__('backend.subscription.cycle')); ?></th>
                                <th><?php echo e(__('backend.subscription.name')); ?></th>
                                <th><?php echo e(__('backend.subscription.start')); ?></th>
                                <th><?php echo e(__('backend.subscription.end')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_subscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($subscription->id); ?></td>
                                    <td>
                                        <?php if($subscription->plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                            <?php echo e(__('backend.plan.free')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('backend.plan.paid')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($subscription->plan->plan_price); ?></td>
                                    <td>
                                        <?php if($subscription->plan->plan_period == \App\Plan::PLAN_LIFETIME): ?>
                                            <?php echo e(__('backend.plan.lifetime')); ?>

                                        <?php elseif($subscription->plan->plan_period == \App\Plan::PLAN_MONTHLY): ?>
                                            <?php echo e(__('backend.plan.monthly')); ?>

                                        <?php elseif($subscription->plan->plan_period == \App\Plan::PLAN_QUARTERLY): ?>
                                            <?php echo e(__('backend.plan.quarterly')); ?>

                                        <?php elseif($subscription->plan->plan_period == \App\Plan::PLAN_YEARLY): ?>
                                            <?php echo e(__('backend.plan.yearly')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($subscription->user->name); ?></td>
                                    <td><?php echo e($subscription->subscription_start_date); ?></td>
                                    <td><?php echo e($subscription->subscription_end_date); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.subscriptions.edit', $subscription->id)); ?>" class="btn btn-primary btn-circle">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/subscription/index.blade.php ENDPATH**/ ?>