<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.plan.add-plan')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.plan.add-plan-desc')); ?></p>
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
                    <form method="POST" action="<?php echo e(route('admin.plans.store')); ?>" class="">
                        <?php echo csrf_field(); ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <span><?php echo e(__('backend.plan.plan-type')); ?>: </span>
                                <span class="text-gray-800"><?php echo e(__('backend.plan.paid-plan')); ?></span>
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
unset($__errorArgs, $__bag); ?>" name="plan_name" value="<?php echo e(old('plan_name')); ?>" autofocus>
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
unset($__errorArgs, $__bag); ?>" name="plan_features"><?php echo e(old('plan_features')); ?></textarea>
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


                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="plan_period" class="text-black"><?php echo e(__('backend.plan.billing-period')); ?></label>

                                <select class="custom-select" name="plan_period">
                                    <option value="<?php echo e(\App\Plan::PLAN_MONTHLY); ?>" <?php echo e(old('plan_period') == \App\Plan::PLAN_MONTHLY ? 'selected' : ''); ?>>
                                        <?php echo e(__('backend.plan.monthly')); ?>

                                    </option>
                                    <option value="<?php echo e(\App\Plan::PLAN_QUARTERLY); ?>" <?php echo e(old('plan_period') == \App\Plan::PLAN_QUARTERLY ? 'selected' : ''); ?>>
                                        <?php echo e(__('backend.plan.quarterly')); ?>

                                    </option>
                                    <option value="<?php echo e(\App\Plan::PLAN_YEARLY); ?>" <?php echo e(old('plan_period') == \App\Plan::PLAN_YEARLY ? 'selected' : ''); ?>>
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
unset($__errorArgs, $__bag); ?>" name="plan_max_featured_listing" value="<?php echo e(old('plan_max_featured_listing')); ?>">
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
unset($__errorArgs, $__bag); ?>" name="plan_price" value="<?php echo e(old('plan_price')); ?>">
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



                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="plan_status" class="text-black"><?php echo e(__('backend.plan.status')); ?></label>

                                <select class="custom-select" name="plan_status">
                                    <option value="<?php echo e(\App\Plan::PLAN_ENABLED); ?>" <?php echo e(old('plan_status') == \App\Plan::PLAN_ENABLED ? 'selected' : ''); ?>>
                                        <?php echo e(__('backend.plan.enabled')); ?>

                                    </option>
                                    <option value="<?php echo e(\App\Plan::PLAN_DISABLED); ?>" <?php echo e(old('plan_status') == \App\Plan::PLAN_DISABLED ? 'selected' : ''); ?>>
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


                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    <?php echo e(__('backend.shared.create')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/plan/create.blade.php ENDPATH**/ ?>