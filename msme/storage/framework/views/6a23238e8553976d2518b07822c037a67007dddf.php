<?php $__env->startSection('styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('backend.comment.comment')); ?></h1>
            <p class="mb-4"><?php echo e(__('backend.comment.comment-desc-user')); ?></p>
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
                                <th><?php echo e(__('backend.comment.id')); ?></th>
                                <th><?php echo e(__('backend.comment.type')); ?></th>
                                <th><?php echo e(__('backend.comment.comment')); ?></th>
                                <th><?php echo e(__('backend.comment.status')); ?></th>
                                <th><?php echo e(__('backend.comment.date')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th><?php echo e(__('backend.comment.id')); ?></th>
                                <th><?php echo e(__('backend.comment.type')); ?></th>
                                <th><?php echo e(__('backend.comment.comment')); ?></th>
                                <th><?php echo e(__('backend.comment.status')); ?></th>
                                <th><?php echo e(__('backend.comment.date')); ?></th>
                                <th><?php echo e(__('backend.shared.action')); ?></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $all_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($comment->id); ?></td>
                                    <td>
                                        <?php if($comment->commentable_type == 'App\Item'): ?>
                                            <a href="<?php echo e(route('page.item', \App\Item::find($comment->commentable_id)->item_slug) . '#comment-' . $comment->id); ?>" target="_blank" class="btn btn-primary btn-sm"><?php echo e(__('backend.sidebar.listing')); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('page.blog.show', \Canvas\Post::find($comment->commentable_id)->slug) . '#comment-' . $comment->id); ?>" target="_blank" class="btn btn-info btn-sm"><?php echo e(__('backend.sidebar.blog')); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($comment->comment); ?></td>
                                    <td>
                                        <?php if($comment->approved): ?>
                                            <a class="btn btn-success btn-sm text-white"><?php echo e(__('backend.shared.approved')); ?></a>
                                        <?php else: ?>
                                            <a class="btn btn-secondary btn-sm text-white"><?php echo e(__('backend.shared.pending')); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($comment->created_at->diffForHumans()); ?></td>
                                    <td>
                                        <?php if($comment->commentable_type == 'App\Item'): ?>
                                            <a href="<?php echo e(route('page.item', \App\Item::find($comment->commentable_id)->item_slug) . '#comment-' . $comment->id); ?>" target="_blank" class="btn btn-info btn-sm"><?php echo e(__('backend.comment.detail')); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('page.blog.show', \Canvas\Post::find($comment->commentable_id)->slug) . '#comment-' . $comment->id); ?>" target="_blank" class="btn btn-info btn-sm"><?php echo e(__('backend.comment.detail')); ?></a>
                                        <?php endif; ?>
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

<?php echo $__env->make('backend.user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/comment/index.blade.php ENDPATH**/ ?>