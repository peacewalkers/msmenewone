@extends('msme.layouts.app')

@section('styles')

@endsection

@section('content')
    <header class="header header--mobile header--mobile-categories" data-sticky="true">
        <nav class="navigation--mobile">
            <div class="navigation__left"><a class="header__back" href="shop-default.html"><i class="icon-chevron-left"></i><strong>Shop</strong></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img src="img\products\clothing\7.jpg" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img src="img\products\clothing\5.jpg" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>$59.99</strong></h3>
                                <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="header__filter">
            <button class="ps-shop__filter-mb" id="filter-sidebar"><i class="icon-equalizer"></i><span>Filter</span></button>
            <div class="header__sort"><i class="icon-sort-amount-desc"></i>
                <select class="ps-select">
                    <option value="1">Sort by</option>
                    <option value="2">Sort by average rating</option>
                    <option value="3">Sort by latest</option>
                    <option value="4">Sort by price: low to high</option>
                    <option value="5">Sort by price: high to low</option>
                </select>
            </div>
        </div>
    </header>

    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Filter Category</h4>
                        <form class="ps-form--widget-search" action="do_action" method="get">
                            <input class="form-control" type="text" placeholder="Search">

                            <button type="submit"><i class="icon-magnifier"></i></button>

                        </form>

                        <figure class="ps-custom-scrollbar" data-height="250">
                         <form method="GET" action="{{ route('page.categories') }}">

                            @foreach($all_printable_categories as $key => $all_printable_category)
                                <div class="ps-checkbox ">
                                    <input {{ in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : '' }} name="filter_categories[]" class="form-control " type="checkbox" value="{{ $all_printable_category['category_id'] }}" id="filter_categories_{{ $all_printable_category['category_name'] }}">
                                    <label class="form-check-label" for="filter_categories_{{ $all_printable_category['category_name'] }}">
                                        {{ $all_printable_category['category_name'] }}
                                    </label>
                                </div>
                            @endforeach
                            <a href="javascript:;" class="show_more">{{ __('listings_filter.show-more') }}</a>
                            @error('filter_categories')
                            <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </figure>

                        <select class="ps-select @error('filter_sort_by') is-invalid @enderror" data-placeholder="Sort Items" name="filter_sort_by" id="filter_sort_by">
                            <option value="{{ \App\Item::ITEMS_SORT_BY_NEWEST }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_NEWEST ? 'selected' : '' }}>{{ __('listings_filter.sort-by-newest') }}</option>
                            <option value="{{ \App\Item::ITEMS_SORT_BY_OLDEST }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_OLDEST ? 'selected' : '' }}>{{ __('listings_filter.sort-by-oldest') }}</option>
                            <option value="{{ \App\Item::ITEMS_SORT_BY_HIGHEST }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_HIGHEST ? 'selected' : '' }}>{{ __('listings_filter.sort-by-highest') }}</option>
                            <option value="{{ \App\Item::ITEMS_SORT_BY_LOWEST }}" {{ $filter_sort_by == \App\Item::ITEMS_SORT_BY_LOWEST ? 'selected' : '' }}>{{ __('listings_filter.sort-by-lowest') }}</option>
                        </select>
                        @error('filter_sort_by')
                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                        <div class="row form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block text-white rounded">
                                    Apply
                                </button>
                            </div>
                        </div>
                        </form>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p> </p>
                            <div class="ps-shopping__actions">


                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        @if(count($paid_items))
                                            @foreach($paid_items as $key => $item)
                                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                    <div class="ps-product">
                                                        <div class="ps-product__thumbnail">
                                                            <a href="{{ route('page.item', $item->item_slug) }}">
                                                                <img src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg')) }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="ps-product__container">
                                                            @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOME, isset($parent_category_id) ? $parent_category_id : null) as $key => $category)
                                                                <a href="{{ route('page.category', $category->category_slug) }}">
                                                                    <span class="category">{{ $category->category_name }}</span>
                                                                </a>
                                                            @endforeach
                                                            <div class="">
                                                                <a class="ps-product__title" href="{{ route('page.item', $item->item_slug) }}">{{ $item->item_title }}</a>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                            @if(count($free_items))
                                                @foreach($free_items as $key => $item)
                                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                        <div class="ps-product">
                                                            <div class="ps-product__thumbnail">
                                                                <a href="{{ route('page.item', $item->item_slug) }}">
                                                                    <img src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg')) }}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="ps-product__container">
                                                                @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOME, isset($parent_category_id) ? $parent_category_id : null) as $key => $category)
                                                                    <a href="{{ route('page.category', $category->category_slug) }}">
                                                                        <span class="category">{{ $category->category_name }}</span>
                                                                    </a>
                                                                @endforeach
                                                                <div class="">
                                                                    <a class="ps-product__title" href="{{ route('page.item', $item->item_slug) }}">{{ $item->item_title }}</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                    </div>
                                </div>

                                <div class="ps-pagination">
                                    {{ $pagination->links() }}
                                </div>
                            </div>

                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">
                                    @if(count($paid_items))
                                        @foreach($paid_items as $key => $item)
                                    <div class="ps-product ps-product--wide">
                                        <div class="ps-product__thumbnail">
                                            <a href="{{ route('page.item', $item->item_slug) }}">
                                                <img src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg')) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="ps-product__container">
                                            <div class="ps-product__content"  >
                                                <a class="ps-product__title" href="{{ route('page.item', $item->item_slug) }}">{{ $item->item_title }}</a>
                                                <p class="ps-product__vendor" >                                                <a href="{{ route('page.category', $category->category_slug) }}">
                                                        <span class="category">{{ $category->category_name }}</span>
                                                    </a>
                                                </p>
                                                    <p> {{ $item->item_description }} </p>

                                            </div>

                                            <div class="ps-product__shopping">
                                                <a class="ps-btn" href="{{ route('page.item', $item->item_slug) }}">Contact Vendor</a>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif

                                        @if(count($free_items))
                                            @foreach($free_items as $key => $item)
                                                <div class="ps-product ps-product--wide">
                                                    <div class="ps-product__thumbnail">
                                                        <a href="{{ route('page.item', $item->item_slug) }}">
                                                            <img src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg')) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="ps-product__container">
                                                    <div class="ps-product__content" >
                                                            <a class="ps-product__title" href="{{ route('page.item', $item->item_slug) }}">{{ $item->item_title }}</a>
                                                            <p class="ps-product__vendor">                                                <a href="{{ route('page.category', $category->category_slug) }}">
                                                                    <span class="category">{{ $category->category_name }}</span>
                                                                </a>
                                                            </p>

                                                                <p> {{ $item->item_description }} </p>
                                                        </div>

                                                        <div class="ps-product__shopping">
                                                            <a class="ps-btn" href="{{ route('page.item', $item->item_slug) }}">Contact Vendor</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                </div>


                                <div class="ps-pagination">
                                    {{ $pagination->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-newsletter">
        <div class="container">
            <form class="ps-form--newsletter" action="do_action" method="post">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__left">
                            <h3>Newsletter</h3>
                            <p>Subcribe to get information about products and coupons</p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-form__right">
                            <div class="form-group--nest">
                                <input class="form-control" type="email" placeholder="Email address">
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('msmefooters')

@endsection
<div class="ps-filter--sidebar">
    <div class="ps-filter__header">
        <h3>Filter Products</h3><a class="ps-btn--close ps-btn--no-boder" href="#"></a>
    </div>
    <div class="ps-filter__content">
        <aside class="widget widget_shop">
            <h4 class="widget-title">Categories</h4>
            <ul class="ps-list--categories">
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Clothing &amp; Apparel</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Womens</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Mens</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Bags</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Sunglasses</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Accessories</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Kid's Fashion</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Garden &amp; Kitchen</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Cookware</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Decoration</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Furniture</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Garden Tools</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Home Improvement</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Powers And Hand Tools</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Utensil &amp; Gadget</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Consumer Electrics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Air Conditioners</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="shop-default.html">Accessories</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Type Hanging Cell</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Type Hanging Wall</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Audios &amp; Theaters</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="shop-default.html">Headphone</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Home Theater System</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Speakers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Car Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="shop-default.html">Audio &amp; Video</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Car Security</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Radar Detector</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Vehicle GPS</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Office Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="shop-default.html">Printers</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Projectors</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Scanners</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Store &amp; Business</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">TV Televisions</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="shop-default.html">4K Ultra HD TVs</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">LED TVs</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">OLED TVs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Washing Machines</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="shop-default.html">Type Drying Clothes</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Type Horizontal</a>
                                </li>
                                <li class="current-menu-item "><a href="shop-default.html">Type Vertical</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Refrigerators</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Health &amp; Beauty</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Equipments</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Hair Care</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Perfumer</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Skin Care</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Computers &amp; Technologies</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Desktop PC</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Laptop</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Smartphones</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Jewelry &amp; Watches</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Gemstone Jewelry</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Men's Watches</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Women's Watches</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Phones &amp; Accessories</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Iphone 8</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Iphone X</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Sam Sung Note 8</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Sam Sung S8</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="shop-default.html">Sport &amp; Outdoor</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="shop-default.html">Freezer Burn</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Fridge Cooler</a>
                        </li>
                        <li class="current-menu-item "><a href="shop-default.html">Wine Cabinets</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item "><a href="shop-default.html">Babies &amp; Moms</a>
                </li>
                <li class="current-menu-item "><a href="shop-default.html">Books &amp; Office</a>
                </li>
                <li class="current-menu-item "><a href="shop-default.html">Cars &amp; Motocycles</a>
                </li>
            </ul>
        </aside>
        <aside class="widget widget_shop">
            <h4 class="widget-title">BY BRANDS</h4>
            <form class="ps-form--widget-search" action="{{ route('page.categories') }}" method="GET">

            <figure class="ps-custom-scrollbar" data-height="250">
                @foreach($all_printable_categories as $key => $all_printable_category)
                    <div class="form-control  form-check filter_category_div">
                        <input {{ in_array($all_printable_category['category_id'], $filter_categories) ? 'checked' : '' }} name="filter_categories[]" class="form-check-input" type="checkbox" value="{{ $all_printable_category['category_id'] }}" id="filter_categories_{{ $all_printable_category['category_id'] }}">
                        <label class="form-check-label" for="filter_categories_{{ $all_printable_category['category_id'] }}">
                            {{ $all_printable_category['category_name'] }}
                        </label>
                    </div>
                @endforeach
                <a href="javascript:;" class="show_more">{{ __('listings_filter.show-more') }}</a>
                @error('filter_categories')
                <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror

            </figure>
                <div class="row form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block text-white rounded">
                            {{ __('listings_filter.update-result') }}
                        </button>
                    </div>
                </div>
            </form>

        </aside>
    </div>
</div>
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="aroma-magnifying-glass"></i></button>
        </form>
    </div>
</div>

@section('msmescripts')

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>

    @include('frontendok.partials.search.js')

    @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
        <!-- Youtube Background for Header -->
            <script src="{{ asset('frontend/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
    @endif
    <script>

        $(document).ready(function(){

            @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            @endif

            /**
             * Start initial map box
             */
            @if(count($paid_items) || count($free_items))

            var window_height = $(window).height();
            $('#mapid-box').css('height', window_height + 'px');

            var map = L.map('mapid-box', {
                    zoom: 15,
                    scrollWheelZoom: true,
                });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var bounds = [];
            @foreach($paid_items as $key => $paid_item)
            bounds.push([ {{ $paid_item->item_lat }}, {{ $paid_item->item_lng }} ]);
            var marker = L.marker([{{ $paid_item->item_lat }}, {{ $paid_item->item_lng }}]).addTo(map);

            @if($paid_item->item_address_hide)
            marker.bindPopup("{{ $paid_item->item_title . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code }}");
            @else
            marker.bindPopup("{{ $paid_item->item_title . ', ' . $paid_item->item_address . ', ' . $paid_item->city->city_name . ', ' . $paid_item->state->state_name . ' ' . $paid_item->item_postal_code }}");
            @endif

            @endforeach

            @foreach($free_items as $key => $free_item)
            bounds.push([ {{ $free_item->item_lat }}, {{ $free_item->item_lng }} ]);
            var marker = L.marker([{{ $free_item->item_lat }}, {{ $free_item->item_lng }}]).addTo(map);

            @if($free_item->item_address_hide)
            marker.bindPopup("{{ $free_item->item_title . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code }}");
            @else
            marker.bindPopup("{{ $free_item->item_title . ', ' . $free_item->item_address . ', ' . $free_item->city->city_name . ', ' . $free_item->state->state_name . ' ' . $free_item->item_postal_code }}");
            @endif

            @endforeach

            map.fitBounds(bounds);

            @endif
            /**
             * End initial map box
             */

            /**
             * Start show more/less
             */
            //this will execute on page load(to be more specific when document ready event occurs)
            if ($(".filter_category_div").length > 5)
            {
                $(".filter_category_div:gt(5)").hide();
                $(".show_more").show();
            }

            $(".show_more").on('click', function() {
                //toggle elements with class .ty-compact-list that their index is bigger than 2
                $(".filter_category_div:gt(5)").toggle();
                //change text of show more element just for demonstration purposes to this demo
                $(this).text() === "{{ __('listings_filter.show-more') }}" ? $(this).text("{{ __('listings_filter.show-less') }}") : $(this).text("{{ __('listings_filter.show-more') }}");
            });
            /**
             * End show more/less
             */

        });

    </script>
@endsection
