@extends('msme.layouts.app')

@section('styles')
@endsection

@section('content')



    <div class="site-section bg-light mt-5 pt-5">
        <h3 class="text-center"> Confirm your Email Address</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.verify-email-sent') }}
                        </div>
                    @endif



                    <form method="POST" action="{{ route('verification.resend') }}" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                {{ __('auth.verify-email-check') }}
                                {{ __('auth.verify-email-not-receive') }},
                            </div>
                        </div>
                        <div class="row form-group text-center">
                            <div class="col-md-12">
                                <button type="submit"   class="ps-btn">{{ __('auth.verify-email-request') }}</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <!-- Youtube Background for Header -->
        <script src="{{ asset('frontend/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
    @endif
    <script>


    </script>

@endsection
