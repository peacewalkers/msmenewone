@extends('msme.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="test site-blocks-cover inner-page-cover overlay" style="margin: 250px 0px; text-align: center;" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center">
                            <h1>{{ __('errors.419.title') }}</h1>
                            <p>{{ __('errors.419.description') }}</p>
                            <a class="btn btn-warning text-white rounded" href="{{ url()->previous() }}">{{ __('errors.shared.go-back') }}</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
