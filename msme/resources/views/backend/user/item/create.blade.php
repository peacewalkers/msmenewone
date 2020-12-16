@extends('backend.user.layouts.app')

@section('styles')
    <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />

    <!-- Image Crop Css -->
    <link href="{{ asset('backend/vendor/croppie/croppie.css') }}" rel="stylesheet" />

    <!-- Bootstrap FD Css-->
    <link href="{{ asset('backend/vendor/bootstrap-fd/bootstrap.fd.css') }}" rel="stylesheet" />
    <link href="{{ asset('msmelist/Semantic/semantic.css') }}" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/0kaqtuycktrl6i614xzq4zs4n9k3zmgbr9xe34zw1c84je5y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@endsection

@section('content')

    <div class="row justify-content-between mt-5 mb-5" style="background-color: #e1e1e1;">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800 ">List Your Business</h1>
        </div>

        <div class="col-3 text-right">
            <a href="{{ route('user.items.index') }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-backspace"></i>
                </span>
                <span class="text">{{ __('backend.shared.back') }}</span>
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">


            <div class="row">
                <div class="col-12">

                    <form method="POST" action="{{ route('user.items.store') }}" id="item-create-form" class="ui form">
                        @csrf

                        <div class="ui stackable two column divided grid">
                            <h5 class="mb-3 " style="margin: auto"> Please let us know your business Type and Category</h5>

                            <div class="row">

                                <div class="column">
                                    <div class="ui-segment">
                                    <label for="categorytype"> Please choose the type of your business</label>
                                    <select   required class="label ui selection fluid dropdown @error('listing_type') is-invalid @enderror"  name="listing_type" id="categorytype">
                                        <option selected>Select category</option>
                                        <option value="1">Services</option>
                                        <option value="2">Supply</option>
                                    </select>
                                    @error('listing_type')
                                    <span class="invalid-tooltip">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                                </div>
                                            </div>

                                <div class="column">
                                    <div class="ui-segment">
                                        <label for="category"> Please choose the type of your business</label>
                                        <select  required id="category" name="category[]"  class="label ui search seection fluid dropdown @error('category') is-invalid @enderror" name="category[]" autocomplete="off">
                                            <option selected>Please choose your business type</option>
                                        </select>
                                        @error('category')
                                        <span class="invalid-tooltip">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                            </div>
                            </div>
                        </div>

                        <hr/>

                              <div class="two fields">
                                <div class="ten wide field">
                                    <label for="item_title" class="text-black">{{ __('backend.item.title') }}</label>
                                    <input id="item_title" type="text" class=" @error('item_title') is-invalid @enderror" name="item_title" value="{{ old('item_title') }}" required>
                                    @error('item_title')
                                    <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="six wide field">
                                    @if(Auth::user()->hasPaidSubscription())
                                        <div class="field">
                                        <label for="item_featured" class="text-black">{{ __('backend.item.featured') }}</label>
                                        <select class="custom-select @error('item_featured') is-invalid @enderror" name="item_featured">

                                            <option value="0" selected>{{ __('backend.shared.no') }}</option>
                                            <option value="{{ \App\Item::ITEM_FEATURED }}">{{ __('backend.shared.yes') }}</option>

                                        </select>
                                        @error('item_featured')
                                        <span class="invalid-tooltip">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    @else
                                        <div class="field">
                                        <input type="hidden" name="item_featured" value="{{ \App\Item::ITEM_NOT_FEATURED }}">
                                        </div>

                                    @endif
                                </div>
                            </div>



                            <div class="four fields ui ">
                                    <div class="eight wide field">
                                        <label for="item_address" class="text-black">{{ __('backend.item.address') }}</label>
                                        <input id="item_address" type="text" class="label ui selection fluid dropdown @error('item_address') is-invalid @enderror" name="item_address" value="{{ old('item_address') }}"  required>
                                        @error('item_address')
                                        <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="five wide field">
                                        <label for="state_id" class="text-black">{{ __('backend.state.state') }}</label>
                                        <select id="select_state_id" class="ui dropdown @error('state_id') is-invalid @enderror" name="state_id"  required>
                                            <option selected>{{ __('backend.item.select-state') }}</option>
                                            @foreach($all_states as $key => $state)
                                                <option value="{{ $state->id }}" {{ $state->id == old('state_id') ? 'selected' : '' }}>{{ $state->state_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                        <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="five wide field">
                                        <label for="city_id" class="text-black">{{ __('backend.city.city') }}</label>
                                        <select id="select_city_id" class="ui dropdown @error('city_id') is-invalid @enderror" name="city_id"  required>
                                            <option selected>{{ __('backend.item.select-city') }}</option>
                                        </select>
                                        @error('city_id')
                                        <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="three wide field">
                                        <label for="item_postal_code" class="text-black">{{ __('backend.item.postal-code') }}</label>
                                        <input id="item_postal_code" type="text" class="@error('item_postal_code') is-invalid @enderror" name="item_postal_code" value="{{ old('item_postal_code') }}"  required>
                                        @error('item_postal_code')
                                        <span class="invalid-tooltip">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                        </div>
                            <div class="one fields">
                                <div class="form-check form-check-inline">
                                    <div class="inline field">
                                        <div class="ui toggle checkbox">
                                            <input {{ old('item_address_hide') == 1 ? 'checked' : '' }} type="checkbox" tabindex="0" class="hidden" id="item_address_hide" name="item_address_hide" value="1" >
                                            <label>{{ __('backend.item.hide-address') }}</label>
                                            <small class="text-muted">
                                                Selecting checkbox will hide your address for being displayed to visitors
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                @error('item_address_hide')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="four fields">

                            <div class="field">
                                <label for="item_lat" class="text-black">{{ __('backend.item.lat') }}</label>
                                <input id="item_lat" type="text" class=" @error('item_lat') is-invalid @enderror" name="item_lat" value="{{ old('item_lat') }}" aria-describedby="latHelpBlock" >
                                <small id="latHelpBlock" class="form-text text-muted">
                                    <a class="lat_lng_select_button btn btn-sm btn-primary text-white">{{ __('backend.item.select-map') }}</a>
                                </small>
                                @error('item_lat')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="item_lng" class="text-black">{{ __('backend.item.lng') }}</label>
                                <input id="item_lng" type="text" class=" @error('item_lng') is-invalid @enderror" name="item_lng" value="{{ old('item_lng') }}" aria-describedby="lngHelpBlock">
                                <small id="lngHelpBlock" class="form-text text-muted">
                                    <a class="lat_lng_select_button btn btn-sm btn-primary text-white">{{ __('backend.item.select-map') }}</a>
                                </small>
                                @error('item_lng')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="item_phone" class="text-black">{{ __('backend.item.phone') }}</label>
                                <input id="item_phone" type="text" class=" @error('item_phone') is-invalid @enderror" name="item_phone" value="{{ old('item_phone') }}"  required>
                                @error('item_phone')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="item_youtube_id" class="text-black">{{ __('customization.item.youtube-id') }}</label>
                                <input id="item_youtube_id" type="text" class=" @error('item_youtube_id') is-invalid @enderror" name="item_youtube_id" value="{{ old('item_youtube_id') }}">
                                @error('item_youtube_id')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row mb-3">

                            <div class="col-md-12">
                                <label for="item_description" class="text-black">{{ __('backend.item.description') }}</label>
                                <textarea class="form-control @error('item_description') is-invalid @enderror" id="item_description" rows="5" name="item_description" >{{ old('item_description') }}</textarea>
                                @error('item_description')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Start web & social media -->
                        <div class="four fields">
                            <div class="field">
                                <label for="item_website" class="text-black">{{ __('backend.item.website') }}</label>
                                <input id="item_website" type="text" class="@error('item_website') is-invalid @enderror" name="item_website" value="{{ old('item_website') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_website')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="item_social_facebook" class="text-black">{{ __('backend.item.facebook') }}</label>
                                <input id="item_social_facebook" type="text" class="@error('item_social_facebook') is-invalid @enderror" name="item_social_facebook" value="{{ old('item_social_facebook') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_social_facebook')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="item_social_twitter" class="text-black">{{ __('backend.item.twitter') }}</label>
                                <input id="item_social_twitter" type="text" class="@error('item_social_twitter') is-invalid @enderror" name="item_social_twitter" value="{{ old('item_social_twitter') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_social_twitter')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="field">
                                <label for="item_social_linkedin" class="text-black">{{ __('backend.item.linkedin') }}</label>
                                <input id="item_social_linkedin" type="text" class="@error('item_social_linkedin') is-invalid @enderror" name="item_social_linkedin" value="{{ old('item_social_linkedin') }}">
                                <small id="linkHelpBlock" class="form-text text-muted">
                                    {{ __('backend.shared.url-help') }}
                                </small>
                                @error('item_social_linkedin')
                                <span class="invalid-tooltip">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <!-- End web & social media -->

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <span class="text-lg text-gray-800">{{ __('backend.item.feature-image') }}</span>
                                <small class="form-text text-muted">
                                    {{ __('backend.item.feature-image-help') }}
                                </small>
                                @error('feature_image')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <button style="background-color: #004e6b; color: #fff;" id="upload_image" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.item.select-image') }}</button>
                                        <img id="image_preview" src="{{  asset('frontend/images/placeholder/full_item_feature_image.jpg') }}" class="img-responsive" >
                                        <input id="feature_image" type="hidden" name="feature_image">
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-6">
                                <span class="text-lg text-gray-800">{{ __('backend.item.gallery-images') }}</span>
                                <small class="form-text text-muted">
                                    {{ __('backend.item.gallery-images-help') }}
                                </small>
                                @error('image_gallery')
                                <span class="invalid-tooltip">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button style="background-color: #004e6b; color: #fff;" id="upload_gallery" type="button" class="btn btn-primary btn-block mb-2">{{ __('backend.item.select-images') }}</button>
                                        <div class="row" id="selected-images">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <div class="form-row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success py-2 px-4 text-white">
                                    {{ __('backend.shared.create') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - feature image -->
    <div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="image-crop-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.item.crop-feature-image') }}</h5>
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
                                <label class="custom-file-label" for="upload_image_input">{{ __('backend.item.choose-image') }}</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
                    <button id="crop_image" type="button" class="btn btn-primary">{{ __('backend.item.crop-image') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - map -->
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('backend.item.select-map-title') }}</h5>
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
    <script src="{{ asset('msmelist/Semantic/semantic.js') }}"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>

    <!-- Image Crop Plugin Js -->
    <script src="{{ asset('backend/vendor/croppie/croppie.js') }}"></script>

    <!-- Bootstrap Fd Plugin Js-->
    <script src="{{ asset('backend/vendor/bootstrap-fd/bootstrap.fd.js') }}"></script>

    <!-- Image Crop Plugin Js -->
    <script src="{{ asset('backend/vendor/croppie/croppie.js') }}"></script>

    <!-- Bootstrap Fd Plugin Js-->
    <script src="{{ asset('backend/vendor/bootstrap-fd/bootstrap.fd.js') }}"></script>


    <script>

        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_OPEN_STREET_MAP)
            /**
             * Start map modal
             */
            var map = L.map('map-modal-body', {
                //center: [37.0902, -95.7129],
                center: [{{ $setting_site_location_lat }}, {{ $setting_site_location_lng }}],
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

                $('#item_lat').val(current_lat);
                $('#item_lng').val(current_lng);
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

            $('#categorytype').on('change', function() {

                $('#category').html('<option selected>Please choose categories</option>');

                if(this.value > 0)
                {
                    var ajax_url = '/ajax/categories/' + this.value;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: ajax_url,
                        method: 'get',
                        data: {
                        },
                        success: function(result){
                            console.log(result);
                            /*$('#category').html('<option selected>Select city</option>');*/
                            $.each(JSON.parse(result), function(key, value) {
                                var city_id = value.id;
                                var city_name = value['category_name'];
                                $('#category').append('<option value="'+ city_id +'">' + city_name + '</option>');
                            });
                        }});
                }
            });

            /**
             * Start state, city selector
             */
            $('#select_state_id').on('change', function() {

                $('#select_city_id').html('<option selected>Loading, please wait...</option>');

                if(this.value > 0)
                {
                    var ajax_url = '/ajax/cities/' + this.value;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: ajax_url,
                        method: 'get',
                        data: {
                        },
                        success: function(result){
                            console.log(result);
                            $('#select_city_id').html('<option selected>Select city</option>');
                            $.each(JSON.parse(result), function(key, value) {
                                var city_id = value.id;
                                var city_name = value.city_name;
                                $('#select_city_id').append('<option value="'+ city_id +'">' + city_name + '</option>');
                            });
                    }});
                }

            });
            /**
             * End state, city selector
             */

            /**
             * Start image gallery uplaod
             */
            $('#upload_gallery').on('click', function(){
                window.selectedImages = [];

                $.FileDialog({
                    accept: "image/jpeg",
                }).on("files.bs.filedialog", function (event) {
                    var html = "";
                    for (var a = 0; a < event.files.length; a++) {

                        if(a == 12) {break;}
                        selectedImages.push(event.files[a]);
                        html += "<div class='col-3 mb-2' id='item_image_gallery_" + a + "'>" +
                            "<img style='max-width: 120px;' src='" + event.files[a].content + "'>" +
                            "<br/><button class='btn btn-danger btn-sm text-white mt-1' onclick='$(\"#item_image_gallery_" + a + "\").remove();'>Delete</button>" +
                            "<input type='hidden' value='" + event.files[a].content + "' name='image_gallery[]'>" +
                            "</div>";
                    }
                    document.getElementById("selected-images").innerHTML += html;
                });
            });
            /**
             * End image gallery uplaod
             */

            /**
             * Start the croppie image plugin
             */
            $image_crop = null;

            $('#upload_image').on('click', function(){

                $('#image-crop-modal').modal('show');
            });

            var window_height = $(window).height();
            var window_width = $(window).width();
            var viewport_height = 0;
            var viewport_width = 0;

            if(window_width >= 800)
            {
                viewport_width = 800;
                viewport_height = 600;
            }
            else
            {
                viewport_width = window_width * 0.8;
                viewport_height = (viewport_width * 687) / 800;
            }

            $('#upload_image_input').on('change', function(){

                if(!$image_crop)
                {
                    $image_crop = $('#image_demo').croppie({
                        enableExif: true,
                        mouseWheelZoom: false,
                        viewport: {
                            width:1200,
                            height:687,
                            type:'square',
                        },
                        boundary:{
                            width:viewport_width + 5,
                            height:viewport_width + 5,
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
                }).then(function(response){
                    $('#feature_image').val(response);
                    $('#image_preview').attr("src", response);
                });

                $('#image-crop-modal').modal('hide');
            });
            /**
             * End the croppie image plugin
             */

        });
    </script>

    @if($site_global_settings->setting_site_map == \App\Setting::SITE_MAP_GOOGLE_MAP)

        <script>
            function initMap()
            {
                const myLatlng = { lat: {{ $site_global_settings->setting_site_location_lat }}, lng: {{ $site_global_settings->setting_site_location_lng }} };
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

                    $('#item_lat').val(current_lat);
                    $('#item_lng').val(current_lng);
                    $('#map-modal').modal('hide');
                });
                $('.lat_lng_select_button').on('click', function(){
                    $('#map-modal').modal('show');
                    //setTimeout(function(){ map.invalidateSize()}, 500);
                });
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js??v=quarterly&key={{ $site_global_settings->setting_site_map_google_api_key }}&callback=initMap"></script>
    @endif

    <script>
        $('.label.ui.dropdown')
            .dropdown();

        $('.no.label.ui.dropdown')
            .dropdown({
                useLabels: false
            });

        $('.ui.button').on('click', function () {
            $('.ui.dropdown')
                .dropdown('restore defaults')
        })

    </script>

    <script>
        $('select.dropdown').dropdown();
        $('select.dropdown2').dropdown();
        $('.ui.checkbox').checkbox();
    </script>
    <script>


        tinymce.init({
            selector: 'textarea',
            height: 250,
            menubar: false,
        });

    </script>

@endsection
