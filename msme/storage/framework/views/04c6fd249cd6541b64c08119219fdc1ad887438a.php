<form action="<?php echo e(route('page.search.do')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-2">
        <h3 class="h5 text-black mb-3"><?php echo e(__('frontend.search.title-search')); ?></h3>
        <div class="form-group">
            <input name="search_query" type="text" class="form-control rounded <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('search_query')); ?>" placeholder="<?php echo e(__('frontend.search.what-are-you-looking-for')); ?>">
            <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-tooltip invalid-tooltip-side-search-query">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <!-- select-wrap, .wrap-icon -->
            <div id="multiple-datasets" class="wrap-icon">
                <span class="icon icon-room z-index-1000"></span>
                <input name="city_state" type="text" class="form-control rounded typeahead <?php $__errorArgs = ['city_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('city_state')); ?>" placeholder="<?php echo e(__('categories.search-city-placeholder')); ?>" aria-describedby="basic-addon1">
                <?php $__errorArgs = ['city_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-tooltip state-city-invalid-tooltip">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <input type="submit" class="btn btn-primary btn-block rounded text-white" value="<?php echo e(__('frontend.search.search')); ?>">
    </div>
</form>
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/partials/search/side.blade.php ENDPATH**/ ?>