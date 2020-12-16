@extends('backend.admin.layouts.app')

@section('styles')

    @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
    <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />
    @endif

    <!-- Image Crop Css -->
    <link href="{{ asset('backend/vendor/croppie/croppie.css') }}" rel="stylesheet" />

    <link href="{{ asset('backend/vendor/simplemde/dist/simplemde.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">{{ __('backend.setting.general-setting') }}</h1>
            <p class="mb-4">{{ __('backend.setting.general-setting-desc') }}</p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12">

                    <form method="POST" action="{{ route('admin.settings.general.update') }}" class="">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">{{ __('backend.setting.info') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="smtp-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="smtp" aria-selected="false">{{ __('smtp.smtp') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">{{ __('backend.setting.seo') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="google-analytics-tab" data-toggle="tab" href="#google-analytics" role="tab" aria-controls="google-analytics" aria-selected="false">{{ __('backend.setting.google-analytics') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="html-tab" data-toggle="tab" href="#html" role="tab" aria-controls="html" aria-selected="false">{{ __('backend.setting.html') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">{{ __('google_map.map') }}</a>
                            </li>

                        </ul>
                        <div class="tab-content pt-3 pb-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">

                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <label class="text-black" for="setting_site_name">{{ __('backend.setting.site-name') }}</label>
                                        <input id="setting_site_name" type="text" class="form-control @error('setting_site_name') is-invalid @enderror" name="setting_site_name" value="{{ old('setting_site_name') ? old('setting_site_name') : $all_general_settings->setting_site_name }}">
                                        @error('setting_site_name')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="text-black" for="setting_site_email">{{ __('backend.setting.site-email') }}</label>
                                        <input id="setting_site_email" type="text" class="form-control @error('setting_site_email') is-invalid @enderror" name="setting_site_email" value="{{ old('setting_site_email') ? old('setting_site_email') : $all_general_settings->setting_site_email }}">
                                        @error('setting_site_email')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="text-black" for="setting_site_phone">{{ __('backend.setting.site-phone') }}</label>
                                        <input id="setting_site_phone" type="text" class="form-control @error('setting_site_phone') is-invalid @enderror" name="setting_site_phone" value="{{ old('setting_site_phone') ? old('setting_site_phone') : $all_general_settings->setting_site_phone }}">
                                        @error('setting_site_phone')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="setting_site_address">{{ __('backend.setting.address') }}</label>
                                        <input id="setting_site_address" type="text" class="form-control @error('setting_site_address') is-invalid @enderror" name="setting_site_address" value="{{ old('setting_site_address') ? old('setting_site_address') : $all_general_settings->setting_site_address }}">
                                        @error('setting_site_address')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_city">{{ __('backend.setting.city') }}</label>
                                        <input id="setting_site_city" type="text" class="form-control @error('setting_site_city') is-invalid @enderror" name="setting_site_city" value="{{ old('setting_site_city') ? old('setting_site_city') : $all_general_settings->setting_site_city }}">
                                        @error('setting_site_city')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_state">{{ __('backend.setting.state') }}</label>
                                        <input id="setting_site_state" type="text" class="form-control @error('setting_site_state') is-invalid @enderror" name="setting_site_state" value="{{ old('setting_site_state') ? old('setting_site_state') : $all_general_settings->setting_site_state }}">
                                        @error('setting_site_state')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_country">{{ __('backend.setting.country') }}</label>
                                        <input id="setting_site_country" type="text" class="form-control @error('setting_site_country') is-invalid @enderror" name="setting_site_country" value="{{ old('setting_site_country') ? old('setting_site_country') : $all_general_settings->setting_site_country }}">
                                        @error('setting_site_country')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_postal_code">{{ __('backend.setting.postal-code') }}</label>
                                        <input id="setting_site_postal_code" type="text" class="form-control @error('setting_site_postal_code') is-invalid @enderror" name="setting_site_postal_code" value="{{ old('setting_site_postal_code') ? old('setting_site_postal_code') : $all_general_settings->setting_site_postal_code }}">
                                        @error('setting_site_postal_code')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="setting_site_about">{{ __('backend.setting.site-about') }}</label>
                                        <textarea rows="4" id="setting_site_about" type="text" class="form-control @error('setting_site_about') is-invalid @enderror" name="setting_site_about">{{ old('setting_site_about') ? old('setting_site_about') : $all_general_settings->setting_site_about }}</textarea>
                                        @error('setting_site_about')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_location_country_id">{{ __('backend.setting.country') }}</label>
                                        <select class="custom-select @error('setting_site_location_country_id') is-invalid @enderror" name="setting_site_location_country_id" id="setting_site_location_country_id">
                                            @foreach($all_countries as $key => $country)
                                                <option {{ (old('setting_site_location_country_id') ? old('setting_site_location_country_id') : $all_general_settings->setting_site_location_country_id) == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->country_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('setting_site_location_country_id')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_location_lat">{{ __('backend.setting.lat') }}</label>
                                        <input id="setting_site_location_lat" type="text" class="form-control @error('setting_site_location_lat') is-invalid @enderror" name="setting_site_location_lat" value="{{ old('setting_site_location_lat') ? old('setting_site_location_lat') : $all_general_settings->setting_site_location_lat }}">
                                        <small id="latHelpBlock" class="form-text text-muted">
                                            <a class="lat_lng_select_button btn btn-sm btn-primary text-white">{{ __('backend.setting.select-map') }}</a>
                                        </small>
                                        @error('setting_site_location_lat')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_location_lng">{{ __('backend.setting.lng') }}</label>
                                        <input id="setting_site_location_lng" type="text" class="form-control @error('setting_site_location_lng') is-invalid @enderror" name="setting_site_location_lng" value="{{ old('setting_site_location_lng') ? old('setting_site_location_lng') : $all_general_settings->setting_site_location_lng }}">
                                        <small id="lngHelpBlock" class="form-text text-muted">
                                            <a class="lat_lng_select_button btn btn-sm btn-primary text-white">{{ __('backend.setting.select-map') }}</a>
                                        </small>
                                        @error('setting_site_location_lng')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="setting_site_language">{{ __('backend.setting.language.language') }}</label>
                                        <select class="custom-select @error('setting_site_language') is-invalid @enderror" name="setting_site_language">
                                            <option value="">{{ __('backend.setting.language.select-language') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_AR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_AR ? 'selected' : '' }}>{{ __('backend.setting.language.arabic') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_CA }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_CA ? 'selected' : '' }}>{{ __('backend.setting.language.catalan') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_DE }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_DE ? 'selected' : '' }}>{{ __('backend.setting.language.german') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_EN }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_EN ? 'selected' : '' }}>{{ __('backend.setting.language.english') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_ES }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_ES ? 'selected' : '' }}>{{ __('backend.setting.language.spanish') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_FA }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_FA ? 'selected' : '' }}>{{ __('backend.setting.language.persian-farsi') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_FR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_FR ? 'selected' : '' }}>{{ __('backend.setting.language.french') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_HI }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_HI ? 'selected' : '' }}>{{ __('backend.setting.language.hindi') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_NL }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_NL ? 'selected' : '' }}>{{ __('backend.setting.language.dutch') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_PT_BR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_PT_BR ? 'selected' : '' }}>{{ __('backend.setting.language.portuguese-brazil') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_RU }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_RU ? 'selected' : '' }}>{{ __('backend.setting.language.russian') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_TR }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_TR ? 'selected' : '' }}>{{ __('backend.setting.language.turkish') }}</option>
                                            <option value="{{ \App\Setting::LANGUAGE_ZH_CN }}" {{ $all_general_settings->setting_site_language == \App\Setting::LANGUAGE_ZH_CN ? 'selected' : '' }}>{{ __('backend.setting.language.chinese') }}</option>
                                        </select>
                                        @error('setting_site_language')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <span class="text-lg text-gray-800">{{ __('backend.setting.website-logo') }}</span>
                                        <small class="form-text text-muted">
                                            {{ __('backend.setting.website-logo-help') }}
                                        </small>
                                        @error('setting_site_logo')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="row mt-3">
                                            <div class="col-8">
                                                <button id="upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.setting.select-image') }}</button>
                                                @if(empty($all_general_settings->setting_site_logo))
                                                    <img id="image_preview" src="{{ asset('frontend/images/placeholder/full_item_feature_image.webp') }}" class="img-responsive">
                                                @else
                                                    <img id="image_preview" src="{{ Storage::disk('public')->url('setting/'. $all_general_settings->setting_site_logo) }}" class="img-responsive">
                                                @endif
                                                <input id="feature_image" type="hidden" name="setting_site_logo">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <span class="text-lg text-gray-800">{{ __('backend.setting.favicon') }}</span>
                                        <small class="form-text text-muted">
                                            {{ __('backend.setting.favicon-help') }}
                                        </small>
                                        @error('setting_site_favicon')
                                        <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <div class="row mt-3">
                                            <div class="col-8">
                                                <button id="favicon_upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.setting.select-image') }}</button>
                                                @if(empty($all_general_settings->setting_site_favicon))
                                                    <img id="favicon_image_preview" src="{{ asset('favicon-96x96.ico') }}" class="img-responsive">
                                                @else
                                                    <img id="favicon_image_preview" src="{{ Storage::disk('public')->url('setting/'. $all_general_settings->setting_site_favicon) }}" class="img-responsive">
                                                @endif
                                                <input id="favicon_image" type="hidden" name="setting_site_favicon">
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                            <div class="tab-pane fade" id="smtp" role="tabpanel" aria-labelledby="smtp-tab">

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input {{ $all_general_settings->settings_site_smtp_enabled == \App\Setting::SITE_SMTP_ENABLED ? 'checked' : '' }} class="form-check-input @error('settings_site_smtp_enabled') is-invalid @enderror" type="checkbox" id="settings_site_smtp_enabled" name="settings_site_smtp_enabled" value="{{ \App\Setting::SITE_SMTP_ENABLED }}">
                                            <label class="form-check-label" for="settings_site_smtp_enabled">
                                                {{ __('smtp.smtp-enabled') }}
                                            </label>
                                        </div>

                                        @error('settings_site_smtp_enabled')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="settings_site_smtp_sender_name">{{ __('smtp.from-name') }}</label>
                                        <input id="settings_site_smtp_sender_name" type="text" class="form-control @error('settings_site_smtp_sender_name') is-invalid @enderror" name="settings_site_smtp_sender_name" value="{{ old('settings_site_smtp_sender_name') ? old('settings_site_smtp_sender_name') : $all_general_settings->settings_site_smtp_sender_name }}">
                                        @error('settings_site_smtp_sender_name')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-black" for="settings_site_smtp_sender_email">{{ __('smtp.from-email') }}</label>
                                        <input id="settings_site_smtp_sender_email" type="text" class="form-control @error('settings_site_smtp_sender_email') is-invalid @enderror" name="settings_site_smtp_sender_email" value="{{ old('settings_site_smtp_sender_email') ? old('settings_site_smtp_sender_email') : $all_general_settings->settings_site_smtp_sender_email }}">
                                        @error('settings_site_smtp_sender_email')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="settings_site_smtp_host">{{ __('smtp.smtp-host') }}</label>
                                        <input id="settings_site_smtp_host" type="text" class="form-control @error('settings_site_smtp_host') is-invalid @enderror" name="settings_site_smtp_host" value="{{ old('settings_site_smtp_host') ? old('settings_site_smtp_host') : $all_general_settings->settings_site_smtp_host }}">
                                        @error('settings_site_smtp_host')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="settings_site_smtp_port">{{ __('smtp.smtp-port') }}</label>
                                        <input id="settings_site_smtp_port" type="number" class="form-control @error('settings_site_smtp_port') is-invalid @enderror" name="settings_site_smtp_port" value="{{ old('settings_site_smtp_port') ? old('settings_site_smtp_port') : $all_general_settings->settings_site_smtp_port }}">
                                        @error('settings_site_smtp_port')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="text-black" for="settings_site_smtp_encryption">{{ __('smtp.smtp-encryption') }}</label>
                                        <select class="custom-select @error('settings_site_smtp_encryption') is-invalid @enderror" name="settings_site_smtp_encryption" id="settings_site_smtp_encryption">
                                            <option {{ (old('settings_site_smtp_encryption') ? old('settings_site_smtp_encryption') : $all_general_settings->settings_site_smtp_encryption) == \App\Setting::SITE_SMTP_ENCRYPTION_NULL ? 'selected' : '' }} value="{{ \App\Setting::SITE_SMTP_ENCRYPTION_NULL }}">{{ __('smtp.smtp-encryption-null') }}</option>
                                            <option {{ (old('settings_site_smtp_encryption') ? old('settings_site_smtp_encryption') : $all_general_settings->settings_site_smtp_encryption) == \App\Setting::SITE_SMTP_ENCRYPTION_SSL ? 'selected' : '' }} value="{{ \App\Setting::SITE_SMTP_ENCRYPTION_SSL }}">{{ __('smtp.smtp-encryption-ssl') }}</option>
                                            <option {{ (old('settings_site_smtp_encryption') ? old('settings_site_smtp_encryption') : $all_general_settings->settings_site_smtp_encryption) == \App\Setting::SITE_SMTP_ENCRYPTION_TLS ? 'selected' : '' }} value="{{ \App\Setting::SITE_SMTP_ENCRYPTION_TLS }}">{{ __('smtp.smtp-encryption-tls') }}</option>
                                        </select>
                                        @error('settings_site_smtp_encryption')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="settings_site_smtp_username">{{ __('smtp.smtp-username') }}</label>
                                        <input id="settings_site_smtp_username" type="text" class="form-control @error('settings_site_smtp_username') is-invalid @enderror" name="settings_site_smtp_username" value="{{ old('settings_site_smtp_username') ? old('settings_site_smtp_username') : $all_general_settings->settings_site_smtp_username }}">
                                        @error('settings_site_smtp_username')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-black" for="settings_site_smtp_password">{{ __('smtp.smtp-password') }}</label>
                                        <input id="settings_site_smtp_password" type="text" class="form-control @error('settings_site_smtp_password') is-invalid @enderror" name="settings_site_smtp_password" value="{{ old('settings_site_smtp_password') ? old('settings_site_smtp_password') : $all_general_settings->settings_site_smtp_password }}">
                                        @error('settings_site_smtp_password')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_seo_home_title">{{ __('backend.setting.homepage-title') }}</label>
                                        <input id="setting_site_seo_home_title" type="text" class="form-control @error('setting_site_seo_home_title') is-invalid @enderror" name="setting_site_seo_home_title" value="{{ old('setting_site_seo_home_title') ? old('setting_site_seo_home_title') : $all_general_settings->setting_site_seo_home_title }}">
                                        @error('setting_site_seo_home_title')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_seo_home_keywords">{{ __('backend.setting.homepage-keywords') }}</label>
                                        <input id="setting_site_seo_home_keywords" type="text" class="form-control @error('setting_site_seo_home_keywords') is-invalid @enderror" name="setting_site_seo_home_keywords" value="{{ old('setting_site_seo_home_keywords') ? old('setting_site_seo_home_keywords') : $all_general_settings->setting_site_seo_home_keywords }}">
                                        <small class="form-text text-muted">
                                            Separate by comma
                                        </small>
                                        @error('setting_site_seo_home_keywords')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="setting_site_seo_home_description">{{ __('backend.setting.homepage-description') }}</label>
                                        <textarea rows="5" class="form-control @error('setting_site_seo_home_description') is-invalid @enderror" name="setting_site_seo_home_description">{{ old('setting_site_seo_home_description') ? old('setting_site_seo_home_description') : $all_general_settings->setting_site_seo_home_description }}</textarea>
                                        @error('setting_site_seo_home_description')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="google-analytics" role="tabpanel" aria-labelledby="google-analytics-tab">
                                <div class="row form-group">

                                    <div class="col-md-6 pl-2">
                                        <div class="form-check form-check-inline">
                                            <input {{ $all_general_settings->setting_site_google_analytic_enabled == \App\Setting::TRACKING_ON ? 'checked' : '' }} class="form-check-input @error('setting_site_google_analytic_enabled') is-invalid @enderror" type="checkbox" id="setting_site_google_analytic_enabled" name="setting_site_google_analytic_enabled" value="{{ \App\Setting::TRACKING_ON }}">
                                            <label class="form-check-label" for="setting_site_google_analytic_enabled">
                                                {{ __('backend.setting.google-analytics-enabled') }}
                                            </label>
                                        </div>

                                        @error('setting_site_google_analytic_enabled')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_google_analytic_tracking_id">{{ __('backend.setting.google-analytics-tracking-id') }}</label>
                                        <input id="setting_site_google_analytic_tracking_id" type="text" class="form-control @error('setting_site_google_analytic_tracking_id') is-invalid @enderror" name="setting_site_google_analytic_tracking_id" value="{{ old('setting_site_google_analytic_tracking_id') ? old('setting_site_google_analytic_tracking_id') : $all_general_settings->setting_site_google_analytic_tracking_id }}">
                                        @error('setting_site_google_analytic_tracking_id')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-6 pl-2">
                                        <div class="form-check form-check-inline">
                                        <input {{ $all_general_settings->setting_site_google_analytic_not_track_admin == \App\Setting::NOT_TRACKING_ADMIN ? 'checked' : '' }} class="form-check-input @error('setting_site_google_analytic_not_track_admin') is-invalid @enderror" type="checkbox" id="setting_site_google_analytic_not_track_admin" name="setting_site_google_analytic_not_track_admin" value="{{ \App\Setting::NOT_TRACKING_ADMIN }}">
                                        <label class="form-check-label" for="setting_site_google_analytic_not_track_admin">
                                            {{ __('backend.setting.google-analytics-no-track-admin') }}
                                        </label>
                                        </div>

                                        @error('setting_site_google_analytic_not_track_admin')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="html" role="tabpanel" aria-labelledby="html-tab">

                                <div class="row form-group mb-5">

                                    <div class="col-md-3 pl-2">
                                        <div class="form-check form-check-inline">
                                            <input {{ $all_general_settings->setting_site_header_enabled == \App\Setting::SITE_HEADER_ENABLED ? 'checked' : '' }} class="form-check-input @error('setting_site_header_enabled') is-invalid @enderror" type="checkbox" id="setting_site_header_enabled" name="setting_site_header_enabled" value="{{ \App\Setting::SITE_HEADER_ENABLED }}">
                                            <label class="form-check-label" for="setting_site_header_enabled">
                                                {{ __('backend.setting.header-enabled') }}
                                            </label>
                                        </div>

                                        @error('setting_site_header_enabled')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-9">
                                        <label class="text-black" for="setting_site_header">{{ __('backend.setting.header-html') }}</label>
                                        <textarea rows="6" id="setting_site_header" type="text" class="form-control @error('setting_site_header') is-invalid @enderror" name="setting_site_header">{{ old('setting_site_header') ? old('setting_site_header') : $all_general_settings->setting_site_header }}</textarea>
                                        <small id="lngHelpBlock" class="form-text text-muted">
                                            {{ __('backend.setting.header-html-help') }}
                                        </small>
                                        @error('setting_site_header')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <hr>

                                <div class="row form-group mt-5">

                                    <div class="col-md-3 pl-2">
                                        <div class="form-check form-check-inline">
                                            <input {{ $all_general_settings->setting_site_footer_enabled == \App\Setting::SITE_FOOTER_ENABLED ? 'checked' : '' }} class="form-check-input @error('setting_site_footer_enabled') is-invalid @enderror" type="checkbox" id="setting_site_footer_enabled" name="setting_site_footer_enabled" value="{{ \App\Setting::SITE_FOOTER_ENABLED }}">
                                            <label class="form-check-label" for="setting_site_footer_enabled">
                                                {{ __('backend.setting.footer-enabled') }}
                                            </label>
                                        </div>

                                        @error('setting_site_footer_enabled')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-9">
                                        <label class="text-black" for="setting_site_footer">{{ __('backend.setting.footer-html') }}</label>
                                        <textarea rows="6" id="setting_site_footer" type="text" class="form-control @error('setting_site_footer') is-invalid @enderror" name="setting_site_footer">{{ old('setting_site_footer') ? old('setting_site_footer') : $all_general_settings->setting_site_footer }}</textarea>
                                        <small id="lngHelpBlock" class="form-text text-muted">
                                            {{ __('backend.setting.footer-html-help') }}
                                        </small>
                                        @error('setting_site_footer')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">


                                <div class="row form-group">

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_map">{{ __('google_map.select-map') }}</label>
                                        <select class="custom-select @error('setting_site_map') is-invalid @enderror" name="setting_site_map" id="setting_site_map">
                                            <option {{ (old('setting_site_map') ? old('setting_site_map') : $all_general_settings->setting_site_map) == \App\Setting::SITE_MAP_OPEN_STREET_MAP ? 'selected' : '' }} value="{{ \App\Setting::SITE_MAP_OPEN_STREET_MAP }}">{{ __('google_map.open-street-map') }}</option>
                                            <option {{ (old('setting_site_map') ? old('setting_site_map') : $all_general_settings->setting_site_map) == \App\Setting::SITE_MAP_GOOGLE_MAP ? 'selected' : '' }} value="{{ \App\Setting::SITE_MAP_GOOGLE_MAP }}">{{ __('google_map.google-map') }}</option>
                                        </select>
                                        <small id="setting_site_mapHelpBlock" class="form-text text-muted">
                                            {{ __('google_map.select-map-help') }}
                                        </small>
                                        @error('setting_site_map')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="text-black" for="setting_site_map_google_api_key">{{ __('google_map.google-map-api-key') }}</label>
                                        <input id="setting_site_map_google_api_key" type="text" class="form-control @error('setting_site_map_google_api_key') is-invalid @enderror" name="setting_site_map_google_api_key" value="{{ old('setting_site_map_google_api_key') ? old('setting_site_map_google_api_key') : $all_general_settings->setting_site_map_google_api_key }}">
                                        @error('setting_site_map_google_api_key')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                            </div>
                        </div>

                        <hr/>

                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    {{ __('backend.shared.update') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Croppie Modal for logo -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.setting.crop-logo-image') }}</h5>
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
                                <label class="custom-file-label" for="upload_image_input">{{ __('backend.setting.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="crop_image" type="button" class="btn btn-primary">{{ __('backend.setting.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Croppie Modal for favicon -->
    <div class="modal fade" id="favicon-image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.setting.crop-favicon-image') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="favicon_image_demo"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="custom-file">
                                <input id="favicon_upload_image_input" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="favicon_upload_image_input">{{ __('backend.setting.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="favicon_crop_image" type="button" class="btn btn-primary">{{ __('backend.setting.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - map -->
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.setting.select-lat-lng-map') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="map-modal-body"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span id="lat_lng_span"></span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="lat_lng_confirm" type="button" class="btn btn-primary">{{ __('backend.shared.confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>
    @endif

    <!-- Image Crop Plugin Js -->
    <script src="{{ asset('backend/vendor/croppie/croppie.js') }}"></script>

    <script src="{{ asset('backend/vendor/simplemde/dist/simplemde.min.js') }}"></script>

    <script>

        $(document).ready(function() {

            /**
             * Start initial HTML code textarea markdown
             */
            var simplemde_header = null;
            var simplemde_footer = null;
            $("#html-tab").on('shown.bs.tab', function (e) {
                //e.target // newly activated tab
                //e.relatedTarget // previous active tab

                console.log("shown html-tab");

                simplemde_header = new SimpleMDE({
                    element: document.getElementById("setting_site_header"),
                    status: false,
                    toolbar: false,
                    spellChecker: false,
                });

                simplemde_footer = new SimpleMDE({
                    element: document.getElementById("setting_site_footer"),
                    status: false,
                    toolbar: false,
                    spellChecker: false,
                });
            });
            $("#html-tab").on('hide.bs.tab', function (e) {
                //e.target // newly activated tab
                //e.relatedTarget // previous active tab

                console.log("hide html-tab");
                simplemde_header.toTextArea();
                simplemde_header = null;

                simplemde_footer.toTextArea();
                simplemde_footer = null;

            });
            /**
             * End initial HTML code textarea markdown
             */


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
                            width:200,
                            height:50,
                            type:'square'
                        },
                        boundary:{
                            width:500,
                            height:300
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

                $('#image-crop-modal').modal('hide');
            });
            /**
             * End the croppie image plugin
             */


            /**
             * Start the croppie image plugin for favicon
             */
            $favicon_image_crop = null;

            $('#favicon_upload_image').on('click', function(){

                $('#favicon-image-crop-modal').modal('show');
            });


            $('#favicon_upload_image_input').on('change', function(){

                if(!$favicon_image_crop)
                {
                    $favicon_image_crop = $('#favicon_image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:96,
                            height:96,
                            type:'square'
                        },
                        boundary:{
                            width:200,
                            height:200
                        }
                    });

                    $('#favicon-image-crop-modal .modal-dialog').css({
                        'max-width':'100%'
                    });
                }

                var reader = new FileReader();

                reader.onload = function (event) {

                    $favicon_image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });

                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#favicon_crop_image').on("click", function(event){

                $favicon_image_crop.croppie('result', {
                    type: 'base64',
                    size: 'viewport'
                }).then(function(response){
                    $('#favicon_image').val(response);
                    $('#favicon_image_preview').attr("src", response);
                });

                $('#favicon-image-crop-modal').modal('hide');
            });
            /**
             * End the croppie image plugin for favicon
             */

            @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
            /**
             * Start map modal
             */
            var map = L.map('map-modal-body', {
                //center: [37.0902, -95.7129],
                center: [{{ $all_general_settings->setting_site_location_lat }}, {{ $all_general_settings->setting_site_location_lng }}],
                zoom: 5,
            });

            var layerGroup = L.layerGroup().addTo(map);
            var current_lat = 0;
            var current_lng = 0;

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.on('click', function(e) {

                // remove all the markers in one go
                layerGroup.clearLayers();
                L.marker([e.latlng.lat, e.latlng.lng]).addTo(layerGroup);

                current_lat = e.latlng.lat;
                current_lng = e.latlng.lng;

                $('#lat_lng_span').text("Lat, Lng : " + e.latlng.lat + ", " + e.latlng.lng);
            });

            $('#lat_lng_confirm').on('click', function(){

                $('#setting_site_location_lat').val(current_lat);
                $('#setting_site_location_lng').val(current_lng);
                $('#map-modal').modal('hide')
            });
            $('.lat_lng_select_button').on('click', function(){
                $('#map-modal').modal('show');
                setTimeout(function(){ map.invalidateSize()}, 500);
            });
            /**
             * End map modal
             */
            @endif
        });
    </script>

    @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP)

        <script>
            function initMap()
            {
                const myLatlng = { lat: {{ $all_general_settings->setting_site_location_lat }}, lng: {{ $all_general_settings->setting_site_location_lng }} };
                const map = new google.maps.Map(document.getElementById('map-modal-body'), {
                    zoom: 4,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                let infoWindow = new google.maps.InfoWindow({
                    content: "{{ __('google_map.select-lat-lng-on-map') }}",
                    position: myLatlng,
                });
                infoWindow.open(map);

                var current_lat = 0;
                var current_lng = 0;

                google.maps.event.addListener(map, 'click', function( event ){

                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        position: event.latLng,
                    });
                    infoWindow.setContent(
                        JSON.stringify(event.latLng.toJSON(), null, 2)
                    );
                    infoWindow.open(map);

                    current_lat = event.latLng.lat();
                    current_lng = event.latLng.lng();
                    console.log( "Latitude: "+current_lat+" "+", longitude: "+current_lng );
                    $('#lat_lng_span').text("Lat, Lng : " + current_lat + ", " + current_lng);
                });

                $('#lat_lng_confirm').on('click', function(){

                    $('#setting_site_location_lat').val(current_lat);
                    $('#setting_site_location_lng').val(current_lng);
                    $('#map-modal').modal('hide')
                });
                $('.lat_lng_select_button').on('click', function(){
                    $('#map-modal').modal('show');
                    //setTimeout(function(){ map.invalidateSize()}, 500);
                });
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key={{ $site_global_settings->setting_site_map_google_api_key }}&callback=initMap"></script>
    @endif
@endsection
