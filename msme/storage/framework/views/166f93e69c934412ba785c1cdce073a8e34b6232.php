<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.item.item')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.item.item-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
            <a href="<?php echo e(route('admin.items.create')); ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text"><?php echo e(__('backend.item.add-item')); ?></span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">
                <div class="col-12">
                    <form class="form-inline" action="<?php echo e(route('admin.items.index')); ?>" method="GET">
                        <div class="form-group mr-2">
                            <select class="custom-select" name="category">
                                <option value="0"><?php echo e(__('backend.item.select-category')); ?></option>
                                <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category['category_id']); ?>" <?php echo e($category['category_id'] == $category_id ? 'selected' : ''); ?>><?php echo e($category['category_name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mr-2">
                            <select class="custom-select" name="state">
                                <option value="0"><?php echo e(__('backend.item.select-state')); ?></option>
                                <?php $__currentLoopData = $all_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>" <?php echo e($state->id == $state_id ? 'selected' : ''); ?>><?php echo e($state->state_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"><?php echo e(__('backend.shared.update')); ?></button>
                    </form>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <?php echo e($items_count . ' ' . __('category_description.records')); ?>

                </div>
            </div>

            <hr class="mt-1">

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><?php echo e(__('backend.item.feature-image')); ?></th>
                                <th><?php echo e(__('backend.category.category')); ?></th>
                                <th><?php echo e(__('backend.item.title')); ?></th>
                                <th><?php echo e(__('backend.item.address')); ?></th>
                                <th><?php echo e(__('backend.city.city')); ?></th>
                                <th><?php echo e(__('backend.state.state')); ?></th>
                                <th><?php echo e(__('backend.item.status')); ?></th>
                                <th><?php echo e(__('backend.item.featured')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.item.feature-image')); ?></th>
                                <th><?php echo e(__('backend.category.category')); ?></th>
                                <th><?php echo e(__('backend.item.title')); ?></th>
                                <th><?php echo e(__('backend.item.address')); ?></th>
                                <th><?php echo e(__('backend.city.city')); ?></th>
                                <th><?php echo e(__('backend.state.state')); ?></th>
                                <th><?php echo e(__('backend.item.status')); ?></th>
                                <th><?php echo e(__('backend.item.featured')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($item->item_image_tiny)): ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_tiny)); ?>" alt="Image" class="img-fluid rounded">
                                        <?php elseif(!empty($item->item_image)): ?>
                                            <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.webp')); ?>" alt="Image" class="img-fluid rounded">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $item->allCategories()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->allCategories()->get()->count() == $key + 1): ?>
                                                <?php echo e($category->category_name); ?>

                                            <?php else: ?>
                                                <?php echo e($category->category_name . ", "); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($item->item_title); ?></td>
                                    <td><?php echo e($item->item_address); ?></td>
                                    <td><?php echo e($item->city->city_name); ?></td>
                                    <td><?php echo e($item->state->state_name); ?></td>
                                    <td>
                                        <?php if($item->item_status == \App\Item::ITEM_SUBMITTED): ?>
                                            <span class="text-warning"><?php echo e(__('backend.item.submitted')); ?></span>
                                        <?php elseif($item->item_status == \App\Item::ITEM_PUBLISHED): ?>
                                            <span class="text-success"><?php echo e(__('backend.item.published')); ?></span>
                                        <?php elseif($item->item_status == \App\Item::ITEM_SUSPENDED): ?>
                                            <span class="text-danger"><?php echo e(__('backend.item.suspended')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->item_featured == 1 ? 'Featured' : ''); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.items.edit', $item->id)); ?>" class="btn btn-sm btn-primary mb-1">
                                            <?php echo e(__('backend.shared.edit')); ?>

                                        </a>
                                        <?php if($item->item_status == \App\Item::ITEM_PUBLISHED): ?>
                                            <form action="<?php echo e(route('admin.items.disapprove', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-warning mb-1"><?php echo e(__('backend.shared.disapprove')); ?></button>
                                            </form>

                                            <form action="<?php echo e(route('admin.items.suspend', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger"><?php echo e(__('backend.shared.suspend')); ?></button>
                                            </form>
                                        <?php elseif($item->item_status == \App\Item::ITEM_SUBMITTED): ?>
                                            <form action="<?php echo e(route('admin.items.approve', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-success mb-1"><?php echo e(__('backend.shared.approve')); ?></button>
                                            </form>

                                            <form action="<?php echo e(route('admin.items.suspend', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger"><?php echo e(__('backend.shared.suspend')); ?></button>
                                            </form>
                                        <?php elseif($item->item_status == \App\Item::ITEM_SUSPENDED): ?>
                                            <form action="<?php echo e(route('admin.items.approve', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-success mb-1"><?php echo e(__('backend.shared.approve')); ?></button>
                                            </form>

                                            <form action="<?php echo e(route('admin.items.disapprove', $item)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <button type="submit" class="btn btn-sm btn-warning"><?php echo e(__('backend.shared.disapprove')); ?></button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php echo e($items->appends(['category' => $category_id, 'state' => $state_id])->links()); ?>

                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/item/index.blade.php ENDPATH**/ ?>