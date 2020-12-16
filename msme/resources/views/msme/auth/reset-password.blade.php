@extends('msme.layouts.app')

@section('styles')
    <!-- Start Google reCAPTCHA version 2 -->
    @if($site_global_settings->setting_site_recaptcha_login_enable == \App\Setting::SITE_RECAPTCHA_LOGIN_ENABLE)
    @endif
    <!-- End Google reCAPTCHA version 2 -->
@endsection

@section('content')


    {{--    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('frontend/images/placeholder/header-inner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">--}}


    <div class="site-section bg-light">
        <div class="">
            <div class="ps-page--my-account">
                <div class="ps-breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>Reset Password</li>
                        </ul>
                    </div>
                </div>

                <div class="ps-my-account">
                    <div class="container">
                        <div class="ps-form--account ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#sign-in">Login</a></li>
                            </ul>

                            <div class="ps-tabs">
                                <div class="ps-tab active" id="sign-in">
                                    <div class="ps-form__content">

                                        <h5>Reset Your Password</h5>

                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('password.update') }}" class="p-5 bg-white">
                                            @csrf
                                            <div class="form-group">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email address" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group submtit">
                                                <button type="submit" class="ps-btn ps-btn--fullwidth">Login</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="ps-form__footer">
                                        <p>Connect with:</p>
                                        <ul class="ps-list--social">
                                            <li><a class="facebook" href="{{ route('auth.login.facebook') }}"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="google" href="{{ route('auth.login.google') }}"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a class="twitter" href="{{ route('auth.login.twitter') }}"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

@endsection
