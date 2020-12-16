@extends('msme.layouts.app')

@section('styles')

@endsection

@section('content')
    <header class="header header--mobile header--mobile-categories" data-sticky="true">

        <div class="header__filter">
            <button class="ps-shop__filter-mb" id="filter-sidebar"><i class="icon-equalizer"></i><span>Filter</span></button>
        </div>
    </header>

    <div class="row mb-4">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('page.home') }}">{{ __('frontend.shared.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('page.categories') }}">{{ __('frontend.item.all-categories') }}</a></li>
                    @foreach($parent_categories as $key => $parent_category)
                        <li class="breadcrumb-item"><a href="{{ route('page.category', $parent_category->category_slug) }}">{{ $parent_category->category_name }}</a></li>
                    @endforeach
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->category_name }}</li>
                </ol>
            </nav>
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
                            {{-- <form method="GET" action="{{ route('page.categories') }}">

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
    --}}
                        </figure>

                        {{-- <select class="ps-select @error('filter_sort_by') is-invalid @enderror" data-placeholder="Sort Items" name="filter_sort_by" id="filter_sort_by">
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
 --}}
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

                                <div class="row">
                                    @if(isset($items))
                                        @if(count($items))
                                            {{ $items->links() }}
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="ps-tab" id="tab-2">
                                <div class="ps-shopping-product">

                                    @if(isset($items))
                                        @if(count($items))
                                            @foreach($items as $key => $item)
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
                                        @else
                                            <div class="col-12">
                                                <p>{{ __('frontend.shared.no-listing') }}</p>
                                            </div>
                                        @endif

                                    @endif

                                </div>


                                <div class="row">

                                    {{ $pagination->links() }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                   {{-- @foreach($all_printable_categories as $key => $all_printable_category)
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
                    @enderror--}}

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

    {{--    @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            <!-- Youtube Background for Header -->
            <script src="{{ asset('frontend/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
        @endif--}}
    <script>

        $(document).ready(function(){

            {{--@if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            @endif--}}

            /**
             * Start initial map box
             */

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
