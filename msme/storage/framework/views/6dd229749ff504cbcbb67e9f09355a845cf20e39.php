<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('products.index')); ?></h1>
            <p class="mb-4"><?php echo e(__('products.index-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('products.add-product')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="row mb-2">
                        <div class="col-12"><span class="text-lg"><?php echo e(__('backend.shared.data-filter')); ?></span></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <form class="form-inline" action="<?php echo e(route('admin.products.index')); ?>" method="GET">
                                <div class="form-group mr-2">
                                    <select class="custom-select" name="show_products_for">
                                        <option value="0" <?php echo e(empty($show_products_for) ? 'selected' : ''); ?>><?php echo e(__('products.show-all-users')); ?></option>
                                        <option value="<?php echo e($admin_user->id); ?>" <?php echo e($show_products_for == $admin_user->id ? 'selected' : ''); ?>><?php echo e(__('products.myself')); ?></option>

                                        <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>" <?php echo e($show_products_for == $user->id ? 'selected' : ''); ?>><?php echo e($user->name . ' (' . $user->email . ')'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group mr-2">
                                    <select class="custom-select" name="show_products_status">
                                        <option value="0" <?php echo e(empty($show_products_status) ? 'selected' : ''); ?>><?php echo e(__('products.show-all-status')); ?></option>

                                        <option value="<?php echo e(\App\Product::STATUS_PENDING); ?>" <?php echo e($show_products_status == \App\Product::STATUS_PENDING ? 'selected' : ''); ?>><?php echo e(__('products.status-pending')); ?></option>
                                        <option value="<?php echo e(\App\Product::STATUS_APPROVED); ?>" <?php echo e($show_products_status == \App\Product::STATUS_APPROVED ? 'selected' : ''); ?>><?php echo e(__('products.status-approved')); ?></option>
                                        <option value="<?php echo e(\App\Product::STATUS_SUSPEND); ?>" <?php echo e($show_products_status == \App\Product::STATUS_SUSPEND ? 'selected' : ''); ?>><?php echo e(__('products.status-suspend')); ?></option>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('backend.shared.update')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><?php echo e(__('products.product-image')); ?></th>
                                <th><?php echo e(__('products.product-name')); ?></th>
                                <th><?php echo e(__('products.product-description')); ?></th>
                                <th><?php echo e(__('products.product-price')); ?></th>
                                <th><?php echo e(__('products.product-status')); ?></th>
                                <th><?php echo e(__('products.product-owner')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('products.product-image')); ?></th>
                                <th><?php echo e(__('products.product-name')); ?></th>
                                <th><?php echo e(__('products.product-description')); ?></th>
                                <th><?php echo e(__('products.product-price')); ?></th>
                                <th><?php echo e(__('products.product-status')); ?></th>
                                <th><?php echo e(__('products.product-owner')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php if(empty($product->product_image_small)): ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                        <?php else: ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('product/' . $product->product_image_small)); ?>" alt="Image" class="img-fluid rounded">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($product->product_name); ?></td>
                                    <td><?php echo e(str_limit($product->product_description, 200)); ?></td>
                                    <td>
                                        <?php if(!empty($product->product_price)): ?>
                                            <?php echo e($setting_product_currency_symbol . $product->product_price); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($product->product_status == \App\Product::STATUS_PENDING): ?>
                                            <span class="text-warning"><?php echo e(__('products.product-status-pending')); ?></span>
                                        <?php elseif($product->product_status == \App\Product::STATUS_APPROVED): ?>
                                            <span class="text-success"><?php echo e(__('products.product-status-approved')); ?></span>
                                        <?php elseif($product->product_status == \App\Product::STATUS_SUSPEND): ?>
                                            <span class="text-danger"><?php echo e(__('products.product-status-suspend')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($product->user()->first()->isUser()): ?>
                                            <a href="<?php echo e(route('admin.users.edit', ['user' => $product->user_id])); ?>" target="_blank">
                                                <?php echo e($product->user()->first()->name); ?>

                                            </a>
                                        <?php else: ?>
                                            <?php echo e(__('products.myself')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.products.edit', ['product' => $product->id])); ?>" class="btn btn-primary btn-circle">
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/product/index.blade.php ENDPATH**/ ?>