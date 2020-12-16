<form action="<?php echo e(route('page.search.do')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row align-items-center">
        <div class="col-lg-12 mb-4 mb-xl-0 col-xl-6">

            <div class="input-group">
                <div class="input-group-prepend" id="search-box-query-icon-div">
                    <div class="input-group-text" id="search-box-query-icon"><i class="fas fa-search"></i></div>
                </div>
                <input id="search_query" name="search_query" type="text" class="form-control rounded <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('search_query') ? old('search_query') : (isset($last_search_query) ? $last_search_query : '')); ?>" placeholder="<?php echo e(__('categories.search-query-placeholder')); ?>">
                <?php $__errorArgs = ['search_query'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-tooltip">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div class="col-lg-12 mb-4 mb-xl-0 col-xl-4 pl-xl-0 pr-xl-0">

            <div id="multiple-datasets" class="wrap-icon">
                <span class="icon icon-room z-index-1000"></span>
                <input id="city_state" name="city_state" type="text" class="form-control rounded typeahead <?php $__errorArgs = ['city_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('city_state') ? old('city_state') : (isset($last_search_city_state) ? $last_search_city_state : '')); ?>" aria-describedby="basic-addon1" placeholder="<?php echo e(__('categories.search-city-placeholder')); ?>">
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

        <div class="col-lg-12 col-xl-2 ml-auto text-right">
            <input type="submit" class="btn btn-primary btn-block rounded text-white" value="<?php echo e(__('frontend.search.search')); ?>">
        </div>

    </div>
</form>
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/partials/search/head.blade.php ENDPATH**/ ?>