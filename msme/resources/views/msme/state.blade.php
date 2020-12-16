@extends('msme.layouts.app')

@section('styles')
@endsection

@section('content')



{{--    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('frontend/images/placeholder/header-inner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">--}}



        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1  >{{ __('frontend.state.title', ['state_name' => $state->state_name]) }}</h1>
                            <p class="mb-0"  >{{ __('frontend.state.description') }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<div class="site-section">
    <div class="container">


        @if($children_categories->count() > 0)
            <div class="overlap-category mb-5">

                <div class="row align-items-stretch no-gutters">
                    @foreach( $children_categories as $key => $children_category )
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="{{ route('page.category', $children_category->category_slug) }}" class="popular-category h-100">

                                @if($children_category->category_icon)
                                    <span class="icon"><span><i class="{{ $children_category->category_icon }}"></i></span></span>
                                @else
                                    <span class="icon"><span><i class="fas fa-heart"></i></span></span>
                                @endif

                                <span class="caption mb-2 d-block">{{ $children_category->category_name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif




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



        <div class="row mb-5">
            <div class="col-md-12 text-left border-primary">
                <h2 class="font-weight-light text-primary">{{ $category->category_name }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">


                <div class="row">

                    @if(count($paid_items))
                        @foreach($paid_items as $key => $item)
                            <div class="col-lg-6">
                                @include('frontend.partials.paid-item-block')
                            </div>
                        @endforeach
                    @endif

                    @if(count($free_items))
                        @foreach($free_items as $key => $item)
                            <div class="col-lg-6">
                                @include('frontend.partials.free-item-block')
                            </div>
                        @endforeach
                    @endif

                </div>

                <div class="row">
                    <div class="col-12">

                        {{ $pagination->links() }}

                    </div>
                </div>



            </div>
            <div class="col-lg-3 ml-auto">

                <div class="pt-3">



                    @include('frontend.partials.search.side')


                </div>

            </div>

        </div>
    </div>
</div>



@endsection

@section('scripts')

    @include('frontend.partials.search.js')


@endsection
