<?php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
?>

<?php if($comments->count() < 1): ?>
    <div class="alert alert-warning"><?php echo e(__('frontend.comment.no-comment')); ?></div>
<?php endif; ?>

<ul class="list-unstyled">
    <?php
        $comments = $comments->sortBy('created_at');

        if (isset($perPage)) {
            $page = request()->query('page', 1) - 1;

            $parentComments = $comments->where('child_id', '');

            $slicedParentComments = $parentComments->slice($page * $perPage, $perPage);

            $slicedParentCommentsIds = $slicedParentComments->pluck('id')->toArray();

            $comments = $comments
                // Remove parent Comments from comments
                ->whereNotIn('id', $slicedParentCommentsIds)
                // Keep only comments that are related to spliced parent comments.
                // This maybe improves performance?
                ->whereIn('child_id', $slicedParentCommentsIds);

            $grouped_comments = new \Illuminate\Pagination\LengthAwarePaginator(
                $slicedParentComments->merge($comments)->groupBy('child_id'),
                $parentComments->count(),
                $perPage
            );

            $grouped_comments->withPath(request()->path());
        } else {
            $grouped_comments = $comments->groupBy('child_id');
        }
    ?>
    <?php $__currentLoopData = $grouped_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment_id => $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($comment_id == ''): ?>
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('comments::_comment', [
                    'comment' => $comment,
                    'grouped_comments' => $grouped_comments
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<?php if(isset($perPage)): ?>
    <?php echo e($grouped_comments->links()); ?>

<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('comments::_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(config('comments.guest_commenting') == true): ?>
    <?php echo $__env->make('comments::_form', [
        'guest_commenting' => true
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e(__('frontend.comment.auth-required')); ?></h5>
            <p class="card-text"><?php echo e(__('frontend.comment.must-login')); ?></p>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary text-white"><?php echo e(__('frontend.comment.login')); ?></a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/vendor/comments/components/comments.blade.php ENDPATH**/ ?>