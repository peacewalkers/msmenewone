<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.message.message')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.message.message-desc')); ?></p>
        </div>
        <div class="col-3 text-right">
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
                            <form class="form-inline" action="<?php echo e(route('admin.messages.index')); ?>" method="GET">
                                <div class="form-group mr-2">
                                    <select class="custom-select" name="user_id">
                                        <option value="0"><?php echo e(__('backend.message.all-users')); ?></option>
                                        <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $user_id ? 'selected' : ''); ?>><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <th><?php echo e(__('backend.message.id')); ?></th>
                                <th><?php echo e(__('backend.message.subject')); ?></th>
                                <th><?php echo e(__('backend.message.creator')); ?></th>
                                <th><?php echo e(__('backend.message.participants')); ?></th>
                                <th><?php echo e(__('backend.message.last-message')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.message.id')); ?></th>
                                <th><?php echo e(__('backend.message.subject')); ?></th>
                                <th><?php echo e(__('backend.message.creator')); ?></th>
                                <th><?php echo e(__('backend.message.participants')); ?></th>
                                <th><?php echo e(__('backend.message.last-message')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($thread->id); ?></td>
                                    <td><?php echo e($thread->subject); ?></td>
                                    <td><?php echo e($thread->creator()->name); ?></td>
                                    <td><?php echo e($thread->participantsString()); ?></td>
                                    <td><?php echo e($thread->latestMessage->body); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.messages.show', $thread->id)); ?>" class="btn btn-primary btn-circle">
                                            <i class="fas fa-search"></i>
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

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/message/index.blade.php ENDPATH**/ ?>