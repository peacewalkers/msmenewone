@extends('msme.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="wrapper">
            <div id="homepage-4">

                    <div class="ps-home-banner  d-none d-md-block ">
                        <div class="container">
                            <div class="ps-section__left">
                                <div class="home-category" data-spm="HomeLeftCategory" data-role="homepage-categories">
                                    <div class="category-left" style="z-index: 999">
                                        <ul class="nav nav-tabs left-title hot" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                                   aria-selected="true">Top Categories</a></li>
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="left-expo tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" >
                                                <div class="expo-list">
                                                    <a href="#">
                                                        <i class="flaticon-fashion"></i>
                                                        <span>Apparel</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-billboard"></i>
                                                        <span>Marketing Materials</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-agronomy"></i>
                                                        <span>Agro Technology</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-car-repair"></i>
                                                        <span>Automobiles</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-ayurvedic"></i>
                                                        <span>Ayurvedic</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-chemistry"></i>
                                                        <span>Chemicals</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-cpu"></i>
                                                        <span>Electronics</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-handicrafts"></i>
                                                        <span>Handicrafts</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-sardine"></i>
                                                        <span>Foods & Beverages</span>
                                                    </a>
                                                    <a href="#">
                                                        <i class="flaticon-winch"></i>
                                                        <span>COnstruction</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="ps-section__right">
                                <div class="ps-carousel--nav-inside owl-slider"
                                     style="max-height: 400px;"
                                     data-owl-auto="true"
                                     data-owl-loop="true"
                                     data-owl-speed="5000"
                                     data-owl-gap="0"
                                     data-owl-nav="true"
                                     data-owl-dots="true"
                                     data-owl-item="1"
                                     data-owl-item-xs="1"
                                     data-owl-item-sm="1"
                                     data-owl-item-md="1"
                                     data-owl-item-lg="1"
                                     data-owl-duration="1000"
                                     data-owl-mousedrag="on"
                                     data-owl-animate-in="fadeIn"
                                     data-owl-animate-out="fadeOut">
                                    <a href="/udyam"><img src="{{asset('msmelist')}}/img/images/3.png" alt=""></a>
                                    <a href="/udyam"><img src="http://www.msmemart.com/upload/sliders/1599136230757.jpg" alt=""></a>
                                  {{--  <a href="#"><img src="{{asset('msmelist')}}/http://www.msmemart.com/upload/sliders/1511772254155.jpg" alt=""></a>
                                    <a href="#"><img src="{{asset('msmelist')}}/http://www.msmemart.com/upload/sliders/1511772254155.jpg" alt=""></a>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rows main-block mx-auto d-none d-md-block ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="img/images/id.svg">
                                        <div class="white-box">
                                            <div class="javascript:void(0);">
                                                <div class="hmb-left">

                                                    </span>
                                                </div>
                                                <div class="hmb-right"><a href="/udyam">
                                                    <div class="hmb-heading">Udyam Registration</div>
                                                    <div class="hmb-content">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.

                                                    </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:void(0);">
                                        <div class="white-box">
                                            <div class="display-flex align-center">
                                                <div class="hmb-left"><span class="bg-upload-prescription"></span></div>
                                                <div class="hmb-right">
                                                    <div class="hmb-heading">SSE Registration</div>
                                                    <div class="hmb-content">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="https://www.apollopharmacy.in/offers">
                                        <div class="white-box">
                                            <div class="display-flex align-center">
                                                <div class="hmb-left"><span class="bg-offer"></span></div>
                                                <div class="hmb-right">
                                                    <div class="hmb-heading">ISO and Trade Mark</div>
                                                    <div class="hmb-content">Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        <div class="ps-section__right d-md-none ">
            <div class="ps-carousel--nav-inside owl-slider"
                 style="max-height: 400px;"
                 data-owl-auto="true"
                 data-owl-loop="true"
                 data-owl-speed="5000"
                 data-owl-gap="0"
                 data-owl-nav="true"
                 data-owl-dots="true"
                 data-owl-item="1"
                 data-owl-item-xs="1"
                 data-owl-item-sm="1"
                 data-owl-item-md="1"
                 data-owl-item-lg="1"
                 data-owl-duration="1000"
                 data-owl-mousedrag="on"
                 data-owl-animate-in="fadeIn"
                 data-owl-animate-out="fadeOut">
                <a href="/udyam"><img src="{{asset('msmelist')}}/img/images/3.png" alt=""></a>
                <a href="/udyam"><img src="http://www.msmemart.com/upload/sliders/1599136230757.jpg" alt=""></a>
                {{--  <a href="#"><img src="{{asset('msmelist')}}/http://www.msmemart.com/upload/sliders/1511772254155.jpg" alt=""></a>
                  <a href="#"><img src="{{asset('msmelist')}}/http://www.msmemart.com/upload/sliders/1511772254155.jpg" alt=""></a>--}}
            </div>
        </div>

    </div>

    <div class="container" style="background-color: #fff;">
    <div class="ps-layout__right mt-3">
            <div class="ps-block--shop-features">
                <div class="ps-block__header">
                    <h3>{{ __('frontend.homepage.featured-ads') }} Listings</h3>
                    <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#recommended1"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended1"><i class="icon-chevron-right"></i></a></div>
                </div>
                <div class="ps-block__content">
                    <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @if(count($paid_items))
                            @foreach($paid_items as $key => $item)
                                <div class="ps-product text-center">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{ route('page.item', $item->item_slug) }}">
                                            <img src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg')) }}" alt="">
                                        </a>

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOME) as $key => $category)
                                            <a href="{{ route('page.category', $category->category_slug) }}" class="mx-auto">
                                                <span class="category text-center">{{ $category->category_name }}</span>
                                            </a>
                                        @endforeach

                                    </div>

                                    <div class="ps-product__container">



                                        <div class="ps-product__content hover">
                                            <a class="ps-product__title" href="{{ route('page.item', $item->item_slug) }}">{{ str_limit($item->item_title, 44, '...') }}</a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                                                    @endif

                    </div>
                </div>
            </div>

            <div class="ps-block--shop-features">
                <div class="ps-block__header">
                    <h3>Popular Listings</h3>
                    <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#recommended"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended"><i class="icon-chevron-right"></i></a></div>
                </div>

                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" id="recommended" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @if(count($popular_items))
                            @foreach($popular_items as $key => $item)
                                <div class="ps-product text-center">
                                    <div class="ps-product__thumbnail ">
                                        <a href="{{ route('page.item', $item->item_slug) }}">
                                            <img src="{{ !empty($item->item_image_small) ? Storage::disk('public')->url('item/' . $item->item_image_small) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg')) }}" alt="">
                                        </a>

                                        @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOME) as $key => $category)
                                            <a href="{{ route('page.category', $category->category_slug) }}">
                                                <span class="category text-center">{{ $category->category_name }}</span>
                                            </a>
                                        @endforeach

                                    </div>

                                    <div class="ps-product__container">

                                        <div class="ps-product__content hover">
                                            <a class="ps-product__title" href="{{ route('page.item', $item->item_slug) }}">{{ str_limit($item->item_title, 44, '...') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif

                    </div>

                </div>
            </div>
        </div>



        <div class="ps-top-categories">
            <div class="">
                <div class="ps-section__header">
                    <h3>TOP CATEGORIES OF THE MONTH</h3>
                </div>
                <div class="ps-section__content"></div>
                <div class="row align-content-lg-stretch">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2 ps-block--category-auto-part" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>Legal Services</h4>
                                <ul>
                                    <li><a href="javascript:void(0)">Accounting, Auditing & Bookkeeping Services</a></li>
                                    <li><a href="javascript:void(0)">Taxation Services</a></li>
                                    <li><a href="javascript:void(0)">Architectural Services</a></li>
                                    <li><a href="javascript:void(0)">Engineering Services</a></li>
                                    <li class="more"><a href="javascript:void(0)">More<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2 ps-block--category-auto-part" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>Computer and Related Services</h4>
                                <ul>
                                    <li><a href="javascript:void(0)">Computer Hardware</a></li>
                                    <li><a href="javascript:void(0)">Software Implementation</a></li>
                                    <li><a href="javascript:void(0)">Data processing</a></li>
                                    <li><a href="javascript:void(0)">Others</a></li>
                                    <li class="more"><a href="javascript:void(0)">More<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2 ps-block--category-auto-part" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>Research and Development Services</h4>
                                <ul>
                                    <li><a href="javascript:void(0)">R&D services on natural sciences</a></li>
                                    <li><a href="javascript:void(0)">R&D services on social sciences and humanities</a></li>
                                    <li><a href="javascript:void(0)">Interdisciplinary R&D Services</a></li>
                                    <li><a href="javascript:void(0)">Others</a></li>
                                    <li class="more"><a href="#">More<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2 ps-block--category-auto-part" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>Other Business Services</h4>
                                <ul>
                                    <li><a href="javascript:void(0)">Advertising Services</a></li>
                                    <li><a href="javascript:void(0)">Management Consulting Service</a></li>
                                    <li><a href="javascript:void(0)">Services Incidental to Mining</a></li>
                                    <li><a href="javascript:void(0)">Services Incidental to Manufacturing</a></li>
                                    <li class="more"><a href="#">More<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2 ps-block--category-auto-part" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>Telecommunication services</h4>
                                <ul>
                                    <li><a href="javascript:void(0)">Voice telephone services</a></li>
                                    <li><a href="javascript:void(0)">Packet-switched data transmission services
                                        </a></li>
                                    <li><a href="javascript:void(0)">Circuit-switched data transmission services</a></li>
                                    <li><a href="javascript:void(0)">Private leased circuit services</a></li>
                                    <li class="more"><a href="#">More<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2 ps-block--category-auto-part" data-mh="categories">
                            <div class="ps-block__content">
                                <h4>Environmental Services</h4>
                                <ul>
                                    <li><a href="javascript:void(0)">Headlight</a></li>
                                    <li><a href="javascript:void(0)">Off-Road Light</a></li>
                                    <li><a href="javascript:void(0)">WSingnal Light</a></li>
                                    <li class="more"><a href="#">More<i class="icon-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="cities" class="msmelist">
            <div class="container">
                <div class="p-15">
                    <h5 class="text-center">  Suppliers from Top Cities</h5>
                    <div class="row city-link">
                        <div class="col ct1">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Delhi</span></a>
                        </div>
                        <div class="col ct2">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Bengaluru</span></a>
                        </div>
                        <div class="col ct3">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Chennai</span></a>
                        </div>
                        <div class="col ct4">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Mumbai</span></a>
                        </div>
                        <div class="col ct5">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Ahmedabad</span></a>
                        </div>
                    </div>
                    <div class="row city-link">

                        <div class="col ct6">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Kolkata</span></a>
                        </div>
                        <div class="col ct7">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Pune</span></a>
                        </div>
                        <div class="col ct8">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Surat</span></a>
                        </div>
                        <div class="col ct9">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Jaipur</span></a>
                        </div>
                        <div class="col ct10">
                            <a href="javascript:void(0)" target="_blank"><span class="img"></span><span class="txt">Hyderabad</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         {{--<div class="ps-client-say row ">

            <div class="col-md-6">
                <div class="ps-section--default ps-home-blog" style="margin-bottom: 10px!important;">
                    <div class="container">
                        <div class="ps-section__header">
                            <h3>News</h3>
                        </div>
                <div class="ps-section__content">
                    <div class="row container">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="#"></a><img src="{{asset('msmelist')}}/img\blog\grid\1.jpg" alt=""></div>
                                <div class="ps-post__content">
                                    <a class="ps-post__title" href="#">Paytm expands collateral-free loans of up to Rs 500k to MSMEs</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail">
                                    <a class="ps-post__overlay" href="#"></a><img src="{{asset('msmelist')}}/img\blog\grid\2.jpg" alt="">
                                </div>
                                <div class="ps-post__content">
                                    <a class="ps-post__title" href="#">Flipkart and Amazon are wooing SMEs this sale season</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail">
                                    <a class="ps-post__overlay" href="#"></a><img src="{{asset('msmelist')}}/img\blog\grid\3.jpg" alt="">
                                </div>
                                <div class="ps-post__content">
                                    <a class="ps-post__title" href="#">Micro enterprises grew the fastest among MSMEs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                        <div class="ps-section--default ps-home-blog">
                            <div class="container">
                                <div class="ps-section__header" style="margin-bottom: 10px">
                                    <h3>Success Stories</h3>
                                </div>
                        <div class="ps-section__content">

                            <div class="ps-carousel--testimonials  testimonial-all owl-slider"
                                 data-owl-auto="true"
                                 data-owl-loop="true"
                                 data-owl-speed="10000"
                                 data-owl-gap="10"
                                 data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="700" data-owl-mousedrag="on">
                                <div class="ps-block--testimonial">
                                    <div class="ps-block__header">
                                        </div>
                                    <div class="ps-block__content"><i class="icon-quote-close"></i>
                                        <h4>Mavya<span>Proprieter</span></h4>
                                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
                                    </div>
                                </div>
                                <div class="ps-block--testimonial">
                                    <div class="ps-block__header">

                                    </div>
                                    <div class="ps-block__content"><i class="icon-quote-close"></i>
                                        <h4>Lochan N<span>Manager, Operations</span></h4>
                                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>


@endsection

@section('msmescripts')

    @endsection
