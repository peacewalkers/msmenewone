<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('setting_cache.manage-website-cache')); ?></h1>
            <p class="mb-4"><?php echo e(__('setting_cache.manage-website-cache-desc')); ?></p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">
                <div class="col-12">
                    <p><strong><?php echo e(__('setting_cache.what-are-cached')); ?></strong></p>
                    <p><?php echo e(__('setting_cache.what-are-cached-help')); ?></p>
                    <p>
                        <a target="_blank" href="https://laravel.com/docs/6.x/configuration#configuration-caching">
                            <i class="fas fa-external-link-alt"></i>
                            laravel.com
                        </a>
                    </p>
                </div>
            </div>

            <div class="row bg-light rounded">
                <div class="col-12 mt-2 mb-1">
                    <?php if(empty($setting_site_last_cached_at)): ?>
                        <p class="text-warning"><?php echo e(__('setting_cache.not-cached')); ?></p>
                    <?php else: ?>
                        <p class="text-success"><?php echo e(__('setting_cache.last-cached-at') . ' ' . Carbon\Carbon::parse($setting_site_last_cached_at)->diffForHumans()); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form method="POST" action="<?php echo e(route('admin.settings.cache.update')); ?>" class="">
                        <?php echo csrf_field(); ?>
                        <div class="row form-group justify-content-between">
                            <div class="col-7">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('setting_cache.generate-cache')); ?>

                                </button>
                            </div>
                            <div class="col-5 text-right">
                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <?php echo e(__('setting_cache.clear-cache')); ?>

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
                    <?php echo e(__('setting_cache.clear-cache-question')); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
                    <form action="<?php echo e(route('admin.settings.cache.destroy')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"><?php echo e(__('setting_cache.clear-cache')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\laravel_project\resources\views/backend/admin/setting/cache/edit.blade.php ENDPATH**/ ?>