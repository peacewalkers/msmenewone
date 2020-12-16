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
        <div class="container">
            <div class="ps-page--my-account">
                <div class="ps-breadcrumb">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
                <div class="ps-my-account">
                    <div class="container">

                        <ul class="ps-tab-list">
                            <li class="active"><a href="#sign-in">Login</a></li>
                            <li><a href="#register">Register</a></li>
                        </ul>

                        <div class="ps-tabs">
                            <div class="ps-tab active" id="sign-in">
                                <div class="ps-form__content">

                                    <h5>Log In Your Account</h5>

                                    @include('backend.admin.partials.alert')

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>
                                        <div class="form-group form-forgot">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <a href="{{ route('password.request') }}">Forgot?</a>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="ps-checkbox">
                                                <input class="form-control" type="checkbox" id="remember" name="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember-me">Rememeber me</label>
                                            </div>
                                        </div>


                                        <!-- Start Google reCAPTCHA version 2 -->
                                        @if($site_global_settings->setting_site_recaptcha_login_enable == \App\Setting::SITE_RECAPTCHA_LOGIN_ENABLE)
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    {!! htmlFormSnippet() !!}
                                                    @error('g-recaptcha-response')
                                                    <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                    @endif
                                    <!-- End Google reCAPTCHA version 2 -->
                                        <div class="form-group submtit">
                                            <button class="ps-btn ps-btn--fullwidth">Login</button>
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


                            <div class="ps-tab" id="register">
                                <div class="ps-form__content">
                                    <h5>Register An Account</h5>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Username or email address">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Password">
                                    </div>
                                    <div class="form-group submtit">
                                        <button class="ps-btn ps-btn--fullwidth">Login</button>
                                    </div>
                                </div>
                                <div class="ps-form__footer">
                                    <p>Connect with:</p>
                                    <ul class="ps-list--social">
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
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
