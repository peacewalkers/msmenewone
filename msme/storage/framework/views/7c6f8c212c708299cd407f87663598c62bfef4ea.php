<!-- Sidebar -->
<div class="row user-sidebar">
    <ul class="d-none d-md-block  col-md-2 navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_listing" aria-expanded="true" aria-controls="collapse_listing">
                <i class="fas fa-sign"></i>
                <span><?php echo e(__('backend.sidebar.listing')); ?></span>
            </a>
            <div id="collapse_listing" class="collapse" aria-labelledby="collapse_listing" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('user.items.create')); ?>">Post New AD</a>
                    
                    <a class="collapse-item" href="<?php echo e(route('user.items.index')); ?>">All Listings</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_message" aria-expanded="true" aria-controls="collapse_message">
                <i class="fas fa-comments"></i>
                <span><?php echo e(__('backend.sidebar.messages')); ?></span>
            </a>
            <div id="collapse_message" class="collapse" aria-labelledby="collapse_message" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('user.messages.index')); ?>"><?php echo e(__('backend.sidebar.all-messages')); ?></a>
                </div>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_review" aria-expanded="true" aria-controls="collapse_review">
                <i class="fas fa-star"></i>
                <span><?php echo e(__('review.backend.sidebar.reviews')); ?></span>
            </a>
            <div id="collapse_review" class="collapse" aria-labelledby="collapse_review" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('user.items.reviews.index')); ?>"><?php echo e(__('review.backend.sidebar.all-reviews')); ?></a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('user.subscriptions.index')); ?>">
                <i class="far fa-credit-card"></i>
                <span><?php echo e(__('backend.sidebar.subscription')); ?></span></a>
        </li>
        <!-- Heading -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('user.profile.update')); ?>">
                <i class="fas fa-address-card"></i>
                <span><?php echo e(__('backend.sidebar.profile')); ?></span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/partials/sidebar.blade.php ENDPATH**/ ?>