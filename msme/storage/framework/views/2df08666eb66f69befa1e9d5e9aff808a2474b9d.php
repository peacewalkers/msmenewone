
<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span> Search by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            <li class="current-menu-item "><a href="#"><i class="icon-star"></i> Hots Promotions</a>
                            </li>
                            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon-laundry"></i> Consumer Electronic</a>
                                <div class="mega-menu">
                                    <div class="mega-menu__column">
                                        <h4>Electronic<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li class="current-menu-item "><a href="#">Home Audio &amp; Theathers</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">TV &amp; Videos</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Camera, Photos &amp; Videos</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Cellphones &amp; Accessories</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Headphones</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Videosgames</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Wireless Speakers</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Office Electronic</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mega-menu__column">
                                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li class="current-menu-item "><a href="#">Digital Cables</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Batteries</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-shirt"></i> Clothing &amp; Apparel</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-lampshade"></i> Home, Garden &amp; Kitchen</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-heart-pulse"></i> Health &amp; Beauty</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-diamond2"></i> Yewelry &amp; Watches</a>
                            </li>
                            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#"><i class="icon-desktop"></i> Computer &amp; Technology</a>
                                <div class="mega-menu">
                                    <div class="mega-menu__column">
                                        <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li class="current-menu-item "><a href="#">Computer &amp; Tablets</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Laptop</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Monitors</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Networking</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Drive &amp; Storages</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Computer Components</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Security &amp; Protection</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Gaming Laptop</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Accessories</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-baby-bottle"></i> Babies &amp; Moms</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-baseball"></i> Sport &amp; Outdoor</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-smartphone"></i> Phones &amp; Accessories</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-book2"></i> Books &amp; Office</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-car-siren"></i> Cars &amp; Motocycles</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-wrench"></i> Home Improments</a>
                            </li>
                            <li class="current-menu-item "><a href="#"><i class="icon-tag"></i> Vouchers &amp; Services</a>
                            </li>
                        </ul>
                    </div>
                </div><a class="ps-logo" href="/"><img src="<?php echo e(asset('msmelist')); ?>/img/images/logo-1.png" style="max-width: 55%" alt=""></a>
            </div>
            <div class="header__center">
                    <form class="ps-form--quick-search" action="<?php echo e(route('page.search.do')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control" name="type">
                            <option value="all" selected="selected">All</option>
                            <option class="level-0" value="products">Products</option>
                            <option class="level-0" value="services">Services</option>
                        </select>

                        <?php $__errorArgs = ['city_state'];
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
                    <input class="form-control" name="search_query" type="text" placeholder="I'm searching for..." id="input-search" style="border: 2px solid #df9b13; padding:22px 22px; border-left: none;" >
                    <button>Search</button>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions">
                    <img src="<?php echo e(asset('msmelist')); ?>/img/images/msme-white.png" style="max-width: 20%; margin-top: 6px;">
                    <img src="<?php echo e(asset('msmelist')); ?>/img/images/150-white.png" style="max-width: 20%; margin-top: -6px;">


                </div>
            </div>
        </div>
    </div>

    <nav class="navigation">
        <div class="ps-container">
            <div class="navigation__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span> Search by Category</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            <li class="current-menu-item "><a href="#">Promotions</a></li>
                            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#">Computer and Related Services</a><span class="sub-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu__column">
                                        <h4>Electronic<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li class="current-menu-item "><a href="#">Home Audio &amp; Theathers</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">TV &amp; Videos</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Camera, Photos &amp; Videos</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Cellphones &amp; Accessories</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Headphones</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Videosgames</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Wireless Speakers</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Office Electronic</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="current-menu-item "><a href="#">Research and Development Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Rental/Leasing Services without Operators</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Audio Visual Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Distribution Services</a>
                            </li>
                            <li class="current-menu-item"><a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>
                            </li>
                            <li class="current-menu-item "><a href="#">Educational Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Financial Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Travel Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">News Agency Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Shipping Services</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Advertising Agencies</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Industrial Testing Labs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navigation__right pl-0">
                <ul class="menu mx-auto">
                    <li class=""><a href="/">Home</a>
                    </li>
                    <li class=""><a href="javascript:void(0)">About Us</a> </span>
                    </li>
                    <li class=""><a href="javascript:void(0)">MSME Loans</a> </span>
                    </li>
                    <li class=" "><a href="#">MSME Registration</a></span>
                    </li>
                    <li class=" "><a href="#">Contact Us</a></span>
                    </li>

                </ul>

                <ul class="menu">

                    <?php if(auth()->guard()->guest()): ?>
                        <li >
                            <a href="<?php echo e(route('login')); ?>" style="left:-95px;"><i class="icon-user"></i> Login
                            </a>
                        </li>

                    <?php else: ?>




                    <li class="menu-item-has-children has-mega-menu" style="left:-95px;">
                        <a href="#">
                            <i class="icon-user"></i><?php echo e(Auth::user()->name); ?></a>
                        <span class="sub-toggle"></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <ul class="mega-menu__list">
                                        <?php if(Auth::user()->isAdmin()): ?>
                                            <li>
                                                <a href="<?php echo e(route('admin.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo e(route('user.index')); ?>"><?php echo e(__('frontend.header.dashboard')); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<header class="header header--mobile" data-sticky="true">
    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo text-center"  href="/">
                <img src="<?php echo e(asset('msmelist')); ?>/img/images/logo-1.png" ></a></div>

    </div>
    <div class="ps-search--mobile">

        <form class="ps-form--search-mobile" action="<?php echo e(route('page.search.do')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group--nest">
                <input class="form-control" name="search_query" type="text" placeholder="Search Listings...">
                <input type="hidden" name="type" value="all">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>


    </div>
</header>
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header">
        <h3>Categoriesss</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile">

            <li class="current-menu-item "><a href="#">Promotions</a></li>
            <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="#">Computer and Related Services</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Electronic<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="#">Home Audio &amp; Theathers</a>
                            </li>
                            <li class="current-menu-item "><a href="#">TV &amp; Videos</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Camera, Photos &amp; Videos</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Cellphones &amp; Accessories</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Headphones</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Videosgames</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Wireless Speakers</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Office Electronic</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mega-menu__column">
                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                        <ul class="mega-menu__list">
                            <li class="current-menu-item "><a href="#">Digital Cables</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Audio &amp; Video Cables</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Batteries</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="current-menu-item "><a href="#">Research and Development Services</a>
            </li>
            <li class="current-menu-item "><a href="#">Rental/Leasing Services without Operators</a>
            </li>
            <li class="current-menu-item "><a href="#">Audio Visual Services</a>
            </li>
            <li class="current-menu-item "><a href="#">Distribution Services</a>
            </li>
            <li class="current-menu-item"><a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>
            </li>
            <li class="current-menu-item "><a href="#">Educational Services</a>
            </li>
            <li class="current-menu-item "><a href="#">Financial Services</a>
            </li>
            <li class="current-menu-item "><a href="#">Travel Services</a>
            </li>
            <li class="current-menu-item "><a href="#">News Agency Services</a>
            </li>
            <li class="current-menu-item "><a href="#">Shipping Services</a>
            </li>
            <li class="current-menu-item "><a href="#">Advertising Agencies</a>
            </li>
            <li class="current-menu-item "><a href="#">Industrial Testing Labs</a>
            </li>
        </ul>
    </div>
</div>
<div class="navigation--list">
    <div class="navigation__content">
        <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
            <i class="icon-menu"></i>
            <span> Menu</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile">
            <i class="icon-list4"></i>
            <span> Categories</span></a>
        <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
            <i class="icon-magnifier"></i><span> Search</span>
        </a>
    </div>
</div>
<div class="ps-panel--sidebar" id="search-sidebar">
    <div class="ps-panel__header">
        <form class="ps-form--search-mobile" action="<?php echo e(route('page.search.do')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group--nest">
                <input class="form-control" type="text" name="search_query" placeholder="Search Listings">
                <input type="hidden" name="type" value="all">
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
    <div class="navigation__content"></div>
</div>

<div class="ps-panel--sidebar" id="menu-mobile">
    <div class="ps-panel__header">
        <h3>Menu</h3>
    </div>
    <div class="ps-panel__content">
        <ul class="menu--mobile ">
            <li class=""><a href="/">Home</a>
            </li>
            <li class=""><a href="javascript:void(0)">About Us</a>
            </li>
            <li class=""><a href="">MSME Registration</a></li>
            <li class=""><a href="">Contact Us</a></li>




            <?php if(auth()->guard()->guest()): ?>
            <li><a href="<?php echo e(route('login')); ?>"> <i class="icon-user"></i> Login/Register</a></li>
            <?php else: ?>

                <li class="current-menu-item menu-item-has-children">
                    <a href="#"> <i class="icon-user"></i><?php echo e(Auth::user()->name); ?> </a><span class="sub-toggle"></span>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <?php if(Auth::user()->isAdmin()): ?>
                                <a href="<?php echo e(route('admin.index')); ?>">Dashboard</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('user.index')); ?>">Dashboard</a>
                            <?php endif; ?>
                        </li>

                        <li class=""><a href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </li>


                <?php endif; ?>

        </ul>

        <img class="center" src="<?php echo e(asset('msmelist')); ?>/img/banners/right.png" style="padding-top: 10px;">
    </div>
</div>

<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/partials/nav.blade.php ENDPATH**/ ?>