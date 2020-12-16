<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.plan.edit-plan')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.plan.edit-plan-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.plans.index')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text"><?php echo e(__('backend.shared.back')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <form method="POST" action="<?php echo e(route('admin.plans.update', $plan->id)); ?>" class="">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <span><?php echo e(__('backend.plan.plan-type')); ?>: </span>
                                <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE): ?>
                                    <span class="text-gray-800"><?php echo e(__('backend.plan.free-plan')); ?></span>
                                <?php else: ?>
                                    <span class="text-gray-800"><?php echo e(__('backend.plan.paid-plan')); ?></span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="plan_name" class="text-black"><?php echo e(__('backend.plan.name')); ?></label>
                                <input id="plan_name" type="text" class="form-control <?php $__errorArgs = ['plan_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="plan_name" value="<?php echo e(old('plan_name') ? old('plan_name') : $plan->plan_name); ?>" autofocus>
                                <?php $__errorArgs = ['plan_name'];
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
                                <label class="text-black" for="plan_features"><?php echo e(__('backend.plan.features')); ?></label>
                                <textarea rows="6" id="plan_features" type="text" class="form-control <?php $__errorArgs = ['plan_features'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="plan_features"><?php echo e(old('plan_features') ? old('plan_features') : $plan->plan_features); ?></textarea>
                                <?php $__errorArgs = ['plan_features'];
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

                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="plan_period" class="text-black"><?php echo e(__('backend.plan.billing-period')); ?></label>

                                    <select class="custom-select" name="plan_period">
                                        <option value="<?php echo e(\App\Plan::PLAN_MONTHLY); ?>" <?php echo e((old('plan_period') ? old('plan_period') : $plan->plan_period) == \App\Plan::PLAN_MONTHLY ? 'selected' : ''); ?>>
                                            <?php echo e(__('backend.plan.monthly')); ?>

                                        </option>
                                        <option value="<?php echo e(\App\Plan::PLAN_QUARTERLY); ?>" <?php echo e((old('plan_period') ? old('plan_period') : $plan->plan_period) == \App\Plan::PLAN_QUARTERLY ? 'selected' : ''); ?>>
                                            <?php echo e(__('backend.plan.quarterly')); ?>

                                        </option>
                                        <option value="<?php echo e(\App\Plan::PLAN_YEARLY); ?>" <?php echo e((old('plan_period') ? old('plan_period') : $plan->plan_period) == \App\Plan::PLAN_YEARLY ? 'selected' : ''); ?>>
                                            <?php echo e(__('backend.plan.yearly')); ?>

                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['plan_period'];
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
                        <?php endif; ?>

                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="plan_max_featured_listing" class="text-black"><?php echo e(__('backend.plan.maximum-featured-listing')); ?></label>
                                    <input id="plan_max_featured_listing" type="text" class="form-control <?php $__errorArgs = ['plan_max_featured_listing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="plan_max_featured_listing" value="<?php echo e(old('plan_max_featured_listing') ? old('plan_max_featured_listing') : $plan->plan_max_featured_listing); ?>">
                                    <?php $__errorArgs = ['plan_max_featured_listing'];
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
                        <?php endif; ?>

                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="plan_price" class="text-black"><?php echo e(__('backend.plan.price')); ?></label>
                                <input id="plan_price" type="text" class="form-control <?php $__errorArgs = ['plan_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="plan_price" value="<?php echo e(old('plan_price') ? old('plan_price') : $plan->plan_price); ?>">
                                <?php $__errorArgs = ['plan_price'];
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
                        <?php endif; ?>

                        <?php if($plan->plan_type == \App\Plan::PLAN_TYPE_PAID): ?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="plan_status" class="text-black"><?php echo e(__('backend.plan.status')); ?></label>

                                <select class="custom-select" name="plan_status">
                                    <option value="<?php echo e(\App\Plan::PLAN_ENABLED); ?>" <?php echo e((old('plan_status') ? old('plan_status') : $plan->plan_status) == \App\Plan::PLAN_ENABLED ? 'selected' : ''); ?>>
                                        <?php echo e(__('backend.plan.enabled')); ?>

                                    </option>
                                    <option value="<?php echo e(\App\Plan::PLAN_DISABLED); ?>" <?php echo e((old('plan_status') ? old('plan_status') : $plan->plan_status) == \App\Plan::PLAN_DISABLED ? 'selected' : ''); ?>>
                                        <?php echo e(__('backend.plan.disabled')); ?>

                                    </option>
                                </select>
                                <?php $__errorArgs = ['plan_status'];
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
                        <?php endif; ?>

                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    <?php echo e(__('backend.shared.update')); ?>

                                </button>
                            </div>
                            <div class="col-4 text-right">
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <?php echo e(__('backend.shared.delete')); ?>

                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.shared.delete-confirm')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(__('backend.shared.delete-message', ['record_type' => __('backend.shared.plan'), 'record_name' => $plan->plan_name])); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.plans.destroy', $plan->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('backend.shared.delete')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/plan/edit.blade.php ENDPATH**/ ?>