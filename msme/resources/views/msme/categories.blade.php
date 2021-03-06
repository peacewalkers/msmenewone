@extends('msme.layouts.app')

@section('styles')

@endsection

@section('content')
    <header class="header header--mobile header--mobile-categories" data-sticky="true">
        <div class="header__filter">
            <button class="ps-shop__filter-mb" id="filter-sidebar">
                <i class="icon-equalizer"></i><span>Filter</span></button>

        </div>
    </header>

    <div class="ps-breadcrumb mb-5">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li>All Categories</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop" id="shop-sidebar">
        <div class="container">
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop">
                        <h4 class="widget-title">Filter Category</h4>

                        <figure class="ps-custom-scrollbar mb-5" data-height="250">

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

                        <div class="row form-group mt-5">
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
                                                    <div class="ps-product text-center">
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
                                                        <div class="ps-product text-center">
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
                                    <div class="ps-product ps-product--wide text-center">
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
                                                <div class="ps-product ps-product--wide text-center">
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

    @include('frontend.partials.search.js')

    <script>

        $(document).ready(function(){

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
