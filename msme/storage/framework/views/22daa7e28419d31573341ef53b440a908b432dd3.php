<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.plan.plan')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.plan.plan-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.plans.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('backend.plan.add-plan')); ?></span>
            </a>
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
                                <th><?php echo e(__('backend.plan.id')); ?></th>
                                <th><?php echo e(__('backend.plan.type')); ?></th>
                                <th><?php echo e(__('backend.plan.name')); ?></th>
                                <th><?php echo e(__('backend.plan.featured-listing')); ?></th>
                                <th><?php echo e(__('backend.plan.features')); ?></th>
                                <th><?php echo e(__('backend.plan.period')); ?></th>
                                <th><?php echo e(__('backend.plan.price')); ?></th>
                                <th><?php echo e(__('backend.plan.status')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.plan.id')); ?></th>
                                <th><?php echo e(__('backend.plan.type')); ?></th>
                                <th><?php echo e(__('backend.plan.name')); ?></th>
                                <th><?php echo e(__('backend.plan.featured-listing')); ?></th>
                                <th><?php echo e(__('backend.plan.features')); ?></th>
                                <th><?php echo e(__('backend.plan.period')); ?></th>
                                <th><?php echo e(__('backend.plan.price')); ?></th>
                                <th><?php echo e(__('backend.plan.status')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($plan->id); ?></td>
                                    <td>
                                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                            <?php echo e(__('backend.plan.free')); ?>

                                        <?php else: ?>
                                            <?php echo e(__('backend.plan.paid')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($plan->plan_name); ?></td>
                                    <td>
                                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID && empty($plan->plan_max_featured_listing)): ?>
                                            <?php echo e(__('backend.plan.unlimited')); ?>

                                        <?php else: ?>
                                            <?php echo e($plan->plan_max_featured_listing); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($plan->plan_features); ?></td>
                                    <td>
                                        <?php if($plan->plan_period == \App\Plan::PLAN_LIFETIME): ?>
                                            <?php echo e(__('backend.plan.lifetime')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY): ?>
                                            <?php echo e(__('backend.plan.monthly')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY): ?>
                                            <?php echo e(__('backend.plan.quarterly')); ?>

                                        <?php elseif($plan->plan_period == \App\Plan::PLAN_YEARLY): ?>
                                            <?php echo e(__('backend.plan.yearly')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($plan->plan_price); ?></td>
                                    <td>
                                        <?php if($plan->plan_status == \App\Plan::PLAN_ENABLED): ?>
                                            <span class="bg-success text-white pl-2 pr-2 pt-1 pb-1"><?php echo e(__('backend.plan.enabled')); ?></span>
                                        <?php else: ?>
                                            <span class="bg-danger text-white pl-2 pr-2 pt-1 pb-1"><?php echo e(__('backend.plan.disabled')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.plans.edit', $plan->id)); ?>" class="btn btn-primary btn-circle">
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/plan/index.blade.php ENDPATH**/ ?>