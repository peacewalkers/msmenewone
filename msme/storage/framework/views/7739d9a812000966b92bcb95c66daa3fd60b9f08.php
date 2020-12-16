<?php if( !empty(Session::get('flash_message')) ): ?>
    <div class="row mb-2">
        <div class="col-12">
            <div class="alert alert-<?php echo e(Session::get('flash_type')); ?> alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('flash_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/partials/alert.blade.php ENDPATH**/ ?>