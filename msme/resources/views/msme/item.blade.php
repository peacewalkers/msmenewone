@extends('msme.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="ps-page--single ps-page--vendor">
        <section class="ps-store-list">
            <div class="container">
                <aside class="ps-block--store-banner">
                    <div class="ps-block__content bg--cover" data-background="{{ Storage::disk('public')->url('item/' . $item->item_image) }}">
                        <h3></h3><a class="ps-block__inquiry" href="#"><i class="fa-envelope-open-o"></i> Request for Quotation</a>
                    </div>
                    <div class="ps-block__user">
                        <div class="ps-block__user-avatar">
                            @if(!empty($item->item_image_tiny))
                                <img src="{{ Storage::disk('public')->url('item/' . $item->item_image_tiny) }}" alt="Image" class="img-fluid">
                            @elseif(!empty($item->item_image))
                                <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="Image" class="img-fluid">
                            @else
                                <img src="{{ asset('frontend/images/placeholder/full_item_feature_image_tiny.jpg') }}" alt="Image" class="img-fluid">
                            @endif
                                @if($item_count_rating > 0)
                                    <div class="row mb-3">
                                        <div class="col-md-4" >
                                            <div class="rating_stars_header text-white">{{$item_average_rating}}</div>
                                        </div>
                                        <div class="col-md-8 pl-0">
                                <span class="item-cover-address-section text-white">
                                    @if($item_count_rating == 1)
                                        {{ '(' . $item_count_rating . ' ' . __('review.frontend.review') . ')' }}
                                    @else
                                        {{ '(' . $item_count_rating . ' ' . __('review.frontend.reviews') . ')' }}
                                    @endif
                                </span>
                                        </div>
                                    </div>
                                @endif
                        </div>
                        <div class="ps-block__user-content">
                            <h2 class="text-white">{{ $item->item_title }} </h2>
                            <p><i class="icon-map-marker  text-white"></i>  @if($item->item_address_hide == 0)
                                    {{ $item->item_address }} <br>
                                @endif
                                {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}</p>
                            <p><i class="icon-envelope  text-white"></i> <a href="mailto:" class="">emailaddress{{--{{ $item->item_title }}--}}</a></p>
                            <p><i class="icon-phone text-white"></i> <a href="tel:{{ $item->item_phone }}" class="">{{ $item->item_phone }}</a></p>
                            <p><i class="fa fa-globe text-white"></i><a href="{{ $item->item_website }}" class="">{{ $item->item_website }}</a></p>
                            @foreach($item_display_categories as $key => $item_category)
                                <a class="btn btn-sm btn-outline-primary rounded mb-2" href="{{ route('page.category', $item_category->category_slug) }}">
                                    <span class="category">{{ $item_category->category_name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

                <div class="ps-section__wrapper">
                    <div class="ps-page__left">
                        <div class="ps-product--detail ps-product--fullwidth">
                            <div class="ps-product__content ps-tab-root">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">Description</a></li>
                                    <li><a href="#tab-2">Images</a></li>
                                    <li><a href="#tab-3">Send Message</a></li>
                                    <li><a href="#tab-4">Reviews</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="ps-document">
                                            {!! clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-product__thumbnail" data-vertical="false">
                                            <div class="row">
                                                @if(count($item->galleries) > 0)
                                                        @foreach($item->galleries as $key => $gallery)
                                                            <a href="{{ Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) }}" rel="item-image-gallery-thumb" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                                                <img alt="Image" src="{{ empty($gallery->item_image_gallery_thumb_name) ? Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) : Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_thumb_name) }}"  class="img-fluid rounded"/>
                                                            </a>
                                                        @endforeach
                                                @else
                                                    <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="Image" class="img-fluid rounded">
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-3">
                                        <h4 style="    text-align: center;
    padding-bottom: 20px;"> Contact Vendor </h4>
                                    @if(Auth::check())

                                        @if(Auth::user()->id != $item->user_id)
                                            @if(Auth::user()->isAdmin())

                                                <!-- message item owner contact form -->
                                                    <form method="POST" action="{{ route('admin.messages.store') }}" class="sendmessage">
                                                        @csrf

                                                        <input type="hidden" name="recipient" value="{{ $item->user_id }}">
                                                        <input type="hidden" name="item" value="{{ $item->id }}">
                                                        <div class="form-group">
                                                            <input id="subject" type="text" class="form-control rounded @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="{{ __('backend.message.subject') }}">
                                                            @error('subject')
                                                            <span class="invalid-tooltip">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea rows="6" id="message" type="text" class="form-control rounded @error('message') is-invalid @enderror" name="message" placeholder="{{ __('backend.message.message-txt') }}">{{ old('message') }}</textarea>
                                                            @error('message')
                                                            <span class="invalid-tooltip">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="ps-btn">Send Message</button>
                                                        </div>
                                                    </form>
                                            @else
                                                <!-- message item owner contact form -->
                                                    <form method="POST" action="{{ route('user.messages.store') }}" class="sendmessage">
                                                        @csrf

                                                        <input type="hidden" name="recipient" value="{{ $item->user_id }}">
                                                        <input type="hidden" name="item" value="{{ $item->id }}">
                                                        <div class="form-group">
                                                            <input id="subject" type="text" class="form-control rounded @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="{{ __('backend.message.subject') }}">
                                                            @error('subject')
                                                            <span class="invalid-tooltip">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea rows="6" id="message" type="text" class="form-control rounded @error('message') is-invalid @enderror" name="message" placeholder="{{ __('backend.message.message-txt') }}">{{ old('message') }}</textarea>
                                                            @error('message')
                                                            <span class="invalid-tooltip">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="ps-btn">Send Message</button>
                                                        </div>
                                                    </form>
                                                @endif

                                                @if(Auth::user()->isAdmin())
                                                    <a target="_blank" href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-outline-primary btn-block rounded">{{ __('frontend.item.edit-listing') }}</a>
                                                @endif
                                            @else
                                                @if(Auth::user()->isAdmin())
                                                    <a target="_blank" href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-outline-primary btn-block rounded">{{ __('frontend.item.edit-listing') }}</a>
                                                @else
                                                    <a target="_blank" href="{{ route('user.items.edit', $item->id) }}" class="btn btn-outline-primary btn-block rounded">{{ __('frontend.item.edit-listing') }}</a>
                                                @endif
                                            @endif

                                        @else
                                        <!-- message item owner contact form -->
                                            <form method="POST" action="{{ route('user.messages.store') }}" class="sendmessage">
                                                @csrf

                                                <input type="hidden" name="recipient" value="{{ $item->user_id }}">
                                                <input type="hidden" name="item" value="{{ $item->id }}">
                                                <div class="form-group">
                                                    <input id="subject" type="text" class="form-control rounded @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="{{ __('backend.message.subject') }}">
                                                    @error('subject')
                                                    <span class="invalid-tooltip">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea rows="6" id="message" type="text" class="form-control rounded @error('message') is-invalid @enderror" name="message" placeholder="{{ __('backend.message.message-txt') }}">{{ old('message') }}</textarea>
                                                    @error('message')
                                                    <span class="invalid-tooltip">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="ps-btn">Send Message</button>

                                                </div>
                                            </form>
                                        @endif

                                    </div>
                                    <div class="ps-tab" id="tab-4">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                                <div class="ps-block--average-rating">
                                                    <div class="ps-block__header">
                                                        <h3>4.00</h3>
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="1">2</option>
                                                            <option value="1">3</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
                                                        </select><span>1 Review</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>5 Star</span>
                                                        <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>4 Star</span>
                                                        <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>3 Star</span>
                                                        <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>2 Star</span>
                                                        <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                    </div>
                                                    <div class="ps-block__star"><span>1 Star</span>
                                                        <div class="ps-progress" data-value="0"><span></span></div><span>0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                                <form class="ps-form--review" action="index.html" method="get">
                                                    <h4>Submit Your Review</h4>
                                                    <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                                    <div class="form-group form-group__rating">
                                                        <label>Your rating of this product</label>
                                                        <select class="ps-rating" data-read-only="false">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="6" placeholder="Write your review here"></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" placeholder="Your Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                                            <div class="form-group">
                                                                <input class="form-control" type="email" placeholder="Your Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group submit">
                                                        <button class="ps-btn">Submit Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>




@endsection

@section('msmescripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>

    <script src="{{ asset('frontend/vendor/justified-gallery/jquery.justifiedGallery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/colorbox/jquery.colorbox-min.js') }}"></script>

    <script src="{{ asset('frontend/vendor/goodshare/goodshare.min.js') }}"></script>

    <script>
        $(document).ready(function(){

            /**
             * Start initial map
             */
            var map = L.map('mapid-item', {
                center: [{{ $item->item_lat }}, {{ $item->item_lng }}],
                zoom: 13,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([{{ $item->item_lat }}, {{ $item->item_lng }}]).addTo(map);
            /**
             * End initial map
             */


            /**
             * Start initial image gallery justify gallery
             */
            $("#item-image-gallery").justifiedGallery({
                rowHeight : 150,
                maxRowHeight: 180,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'item-image-gallery-thumb', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            /**
             * End initial image gallery justify gallery
             */

            /**
             * Start initial review image gallery justify gallery
             */
            @foreach($reviews as $key => $review)
            @if($item->reviewGalleryCountByReviewId($review->id))
            $("#review-image-gallery-{{ $review->id }}").justifiedGallery({
                rowHeight : 80,
                maxRowHeight: 100,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'review-image-gallery-thumb-{{ $review->id }}', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            @endif
            @endforeach
            /**
             * End initial review image gallery justify gallery
             */

            /**
             * Start initial share button and share modal
             */
            $('.item-share-button').on('click', function(){
                $('#share-modal').modal('show');
            });

            @error('item_share_email_name')
            $('#share-modal').modal('show');
            @enderror

            @error('item_share_email_from_email')
            $('#share-modal').modal('show');
            @enderror

            @error('item_share_email_to_email')
            $('#share-modal').modal('show');
            @enderror

            @error('item_share_email_note')
            $('#share-modal').modal('show');
            @enderror
            /**
             * End initial share button and share modal
             */

            /**
             * Start initial save button
             */

            // xl view
            $('#item-save-button-xl').on('click', function(){
                $("#item-save-button-xl").addClass("disabled");
                $("#item-save-form-xl").submit();
            });

            $('#item-saved-button-xl').on('click', function(){
                $("#item-saved-button-xl").off("mouseenter");
                $("#item-saved-button-xl").off("mouseleave");
                $("#item-saved-button-xl").addClass("disabled");
                $("#item-unsave-form-xl").submit();
            });

            $("#item-saved-button-xl").on('mouseenter', function(){
                $("#item-saved-button-xl").attr("class", "btn btn-danger rounded text-white");
                $("#item-saved-button-xl").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button-xl").on('mouseleave', function(){
                $("#item-saved-button-xl").attr("class", "btn btn-warning rounded text-white");
                $("#item-saved-button-xl").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });

            // md view
            $('#item-save-button-md').on('click', function(){
                $("#item-save-button-md").addClass("disabled");
                $("#item-save-form-md").submit();
            });

            $('#item-saved-button-md').on('click', function(){
                $("#item-saved-button-md").off("mouseenter");
                $("#item-saved-button-md").off("mouseleave");
                $("#item-saved-button-md").addClass("disabled");
                $("#item-unsave-form-md").submit();
            });

            $("#item-saved-button-md").on('mouseenter', function(){
                $("#item-saved-button-md").attr("class", "btn btn-danger rounded text-white");
                $("#item-saved-button-md").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button-md").on('mouseleave', function(){
                $("#item-saved-button-md").attr("class", "btn btn-warning rounded text-white");
                $("#item-saved-button-md").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });

            // sm view
            $('#item-save-button-sm').on('click', function(){
                $("#item-save-button-sm").addClass("disabled");
                $("#item-save-form-sm").submit();
            });

            $('#item-saved-button-sm').on('click', function(){
                $("#item-saved-button-sm").off("mouseenter");
                $("#item-saved-button-sm").off("mouseleave");
                $("#item-saved-button-sm").addClass("disabled");
                $("#item-unsave-form-sm").submit();
            });

            $("#item-saved-button-sm").on('mouseenter', function(){
                $("#item-saved-button-sm").attr("class", "btn btn-sm btn-danger rounded text-white");
                $("#item-saved-button-sm").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
            });

            $("#item-saved-button-sm").on('mouseleave', function(){
                $("#item-saved-button-sm").attr("class", "btn btn-sm btn-warning rounded text-white");
                $("#item-saved-button-sm").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
            });
            /**
             * End initial save button
             */

            /**
             * Start rating star
             */
            @if($item_count_rating > 0)
            $(".rating_stars_header").rateYo({
                spacing: "5px",
                starWidth: "23px",
                readOnly: true,
                rating: {{ $item_average_rating }},
            });
            @endif
            /**
             * End rating star
             */

            /**
             * Start rating sort by
             */
            $('#rating_sort_by').on('change', function() {
                $( "#item-rating-sort-by-form" ).submit();
            });
            /**
             * End rating sort by
             */
        });
    </script>
<script>
    $(document).on("click", '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
    @include('frontend.partials.search.js')
@endsection
