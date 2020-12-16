@extends('msme.layouts.app')

@section('styles')
@endsection

@section('content')







    <div class="site-section bg-light pt-5 mt-5">
        <div class="container">
            <h3  class="text-center" >{{ __('auth.reset-password') }}</h3>
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5"  data-aos="fade">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">{{ __('auth.email-addr') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group text-center">
                            <div class="col-md-12">
                                <button type="submit"  class="ps-btn">
                                    {{ __('auth.send-password-reset-link') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection
