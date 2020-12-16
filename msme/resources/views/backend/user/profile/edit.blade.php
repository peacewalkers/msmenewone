@extends('backend.user.layouts.app')

@section('styles')
    <!-- Image Crop Css -->
    <link href="{{ asset('backend/vendor/croppie/croppie.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">{{ __('backend.user.edit-profile') }}</h1>
            <p class="mb-4">{{ __('backend.user.edit-profile-desc') }}</p>
        </div>
        <div class="col-3 text-right">
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-6">
                    <form method="POST" action="{{ route('user.profile.update') }}" class="">
                        @csrf

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="name" class="text-black">{{ __('backend.user.user-name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $login_user->name }}" autofocus>
                                @error('name')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">{{ __('backend.user.user-email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? old('email') : $login_user->email }}">
                                @error('email')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="user_about">{{ __('backend.user.user-about') }}</label>
                                <textarea rows="4" id="user_about" class="form-control @error('user_about') is-invalid @enderror" name="user_about">{{ old('user_about') ? old('user_about') : $login_user->user_about }}</textarea>
                                @error('user_about')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">

                                <label class="text-black" for="user_prefer_language">{{ __('backend.setting.language.language') }}</label>
                                <select class="custom-select @error('user_prefer_language') is-invalid @enderror" name="user_prefer_language">
                                    <option value="">{{ __('backend.setting.language.select-language') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_AR }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_AR ? 'selected' : '' }}>{{ __('backend.setting.language.arabic') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_CA }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_CA ? 'selected' : '' }}>{{ __('backend.setting.language.catalan') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_DE }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_DE ? 'selected' : '' }}>{{ __('backend.setting.language.german') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_EN }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_EN ? 'selected' : '' }}>{{ __('backend.setting.language.english') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_ES }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_ES ? 'selected' : '' }}>{{ __('backend.setting.language.spanish') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_FA }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_FA ? 'selected' : '' }}>{{ __('backend.setting.language.persian-farsi') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_FR }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_FR ? 'selected' : '' }}>{{ __('backend.setting.language.french') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_HI }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_HI ? 'selected' : '' }}>{{ __('backend.setting.language.hindi') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_NL }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_NL ? 'selected' : '' }}>{{ __('backend.setting.language.dutch') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_PT_BR }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_PT_BR ? 'selected' : '' }}>{{ __('backend.setting.language.portuguese-brazil') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_RU }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_RU ? 'selected' : '' }}>{{ __('backend.setting.language.russian') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_TR }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_TR ? 'selected' : '' }}>{{ __('backend.setting.language.turkish') }}</option>
                                    <option value="{{ \App\Setting::LANGUAGE_ZH_CN }}" {{ $login_user->user_prefer_language == \App\Setting::LANGUAGE_ZH_CN ? 'selected' : '' }}>{{ __('backend.setting.language.chinese') }}</option>
                                </select>
                                @error('user_prefer_language')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-6">
                                <span class="text-lg text-gray-800">{{ __('backend.user.profile-image') }}</span>
                                <small class="form-text text-muted">
                                    {{ __('backend.user.profile-image-help') }}
                                </small>
                                @error('user_image')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.user.select-image') }}</button>
                                        @if(empty($login_user->user_image))
                                            <img id="image_preview" src="{{ asset('frontend/images/placeholder/profile-' . intval($login_user->id % 10) . '.webp') }}" class="img-responsive">
                                        @else
                                            <img id="image_preview" src="{{ Storage::disk('public')->url('user/'. $login_user->user_image) }}" class="img-responsive">
                                        @endif
                                        <input id="feature_image" type="hidden" name="user_image">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr/>

                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success text-white">
                                    {{ __('backend.shared.update') }}
                                </button>
                            </div>
                            <div class="col-4 text-right">
                                <a class="text-danger" href="{{ route('user.profile.password.edit') }}">
                                    {{ __('backend.user.change-password') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Croppie Modal -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.user.crop-profile-image') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="custom-file">
                                <input id="upload_image_input" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="upload_image_input">{{ __('backend.user.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="crop_image" type="button" class="btn btn-primary">{{ __('backend.user.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- Image Crop Plugin Js -->
    <script src="{{ asset('backend/vendor/croppie/croppie.js') }}"></script>

    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            /**
             * Start the croppie image plugin
             */
            $image_crop = null;

            $('#upload_image').on('click', function(){

                $('#image-crop-modal').modal('show');
            });


            $('#upload_image_input').on('change', function(){

                if(!$image_crop)
                {
                    $image_crop = $('#image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:70,
                            height:70,
                            type:'square'
                        },
                        boundary:{
                            width:150,
                            height:150
                        }
                    });

                    $('#image-crop-modal .modal-dialog').css({
                        'max-width':'100%'
                    });
                }

                var reader = new FileReader();

                reader.onload = function (event) {

                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#crop_image').on("click", function(event){

                $image_crop.croppie('result', {
                    type: 'base64',
                    size: 'viewport'
                }).then(function(response){
                    $('#feature_image').val(response);
                    $('#image_preview').attr("src", response);
                });

                $('#image-crop-modal').modal('hide')
            });
            /**
             * End the croppie image plugin
             */

        });
    </script>

@endsection
