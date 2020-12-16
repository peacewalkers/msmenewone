<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.category.category')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.category.category-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('backend.category.add-category')); ?></span>
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
                                <th><?php echo e(__('backend.category.id')); ?></th>
                                <th><?php echo e(__('backend.category.name')); ?></th>
                                <th><?php echo e(__('backend.category.slug')); ?></th>
                                <th><?php echo e(__('backend.category.icon')); ?></th>
                                <th><?php echo e(__('categories.parent-cat')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.category.id')); ?></th>
                                <th><?php echo e(__('backend.category.name')); ?></th>
                                <th><?php echo e(__('backend.category.slug')); ?></th>
                                <th><?php echo e(__('backend.category.icon')); ?></th>
                                <th><?php echo e(__('categories.parent-cat')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->id); ?></td>
                                    <td><?php echo e($category->category_name); ?></td>
                                    <td><?php echo e($category->category_slug); ?></td>
                                    <td>
                                        <i class="<?php echo e($category->category_icon); ?>"></i>
                                        <?php echo e($category->category_icon); ?>

                                    </td>
                                    <td>
                                        <?php if(!empty($category->category_parent_id)): ?>
                                            <?php echo e(\App\Category::find($category->category_parent_id)->category_name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-primary btn-circle">
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/category/index.blade.php ENDPATH**/ ?>