<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="ps-page--single ps-page--vendor">
        <section class="ps-store-list">
            <div class="container">
                <aside class="ps-block--store-banner">
                    <div class="ps-block__content bg--cover" data-background="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>">
                        <h3></h3><a class="ps-block__inquiry" href="#"><i class="fa-envelope-open-o"></i> Request for Quotation</a>
                    </div>
                    <div class="ps-block__user">
                        <div class="ps-block__user-avatar">
                            <?php if(!empty($item->item_image_tiny)): ?>
                                <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image_tiny)); ?>" alt="Image" class="img-fluid">
                            <?php elseif(!empty($item->item_image)): ?>
                                <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid">
                            <?php else: ?>
                                <img src="<?php echo e(asset('frontend/images/placeholder/full_item_feature_image_tiny.jpg')); ?>" alt="Image" class="img-fluid">
                            <?php endif; ?>
                                <?php if($item_count_rating > 0): ?>
                                    <div class="row mb-3">
                                        <div class="col-md-4" >
                                            <div class="rating_stars_header text-white"><?php echo e($item_average_rating); ?></div>
                                        </div>
                                        <div class="col-md-8 pl-0">
                                <span class="item-cover-address-section text-white">
                                    <?php if($item_count_rating == 1): ?>
                                        <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.review') . ')'); ?>

                                    <?php else: ?>
                                        <?php echo e('(' . $item_count_rating . ' ' . __('review.frontend.reviews') . ')'); ?>

                                    <?php endif; ?>
                                </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                        </div>
                        <div class="ps-block__user-content">
                            <h2 class="text-white"><?php echo e($item->item_title); ?> </h2>
                            <p><i class="icon-map-marker  text-white"></i>  <?php if($item->item_address_hide == 0): ?>
                                    <?php echo e($item->item_address); ?> <br>
                                <?php endif; ?>
                                <?php echo e($item->city->city_name); ?>, <?php echo e($item->state->state_name); ?> <?php echo e($item->item_postal_code); ?></p>
                            <p><i class="icon-envelope  text-white"></i> <a href="mailto:" class="">emailaddress</a></p>
                            <p><i class="icon-phone text-white"></i> <a href="tel:<?php echo e($item->item_phone); ?>" class=""><?php echo e($item->item_phone); ?></a></p>
                            <p><i class="fa fa-globe text-white"></i><a href="<?php echo e($item->item_website); ?>" class=""><?php echo e($item->item_website); ?></a></p>
                            <?php $__currentLoopData = $item_display_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="btn btn-sm btn-outline-primary rounded mb-2" href="<?php echo e(route('page.category', $item_category->category_slug)); ?>">
                                    <span class="category"><?php echo e($item_category->category_name); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php echo clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?>

                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="ps-product__thumbnail" data-vertical="false">
                                            <div class="row">
                                                <?php if(count($item->galleries) > 0): ?>
                                                        <?php $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name)); ?>" rel="item-image-gallery-thumb" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                                                                <img alt="Image" src="<?php echo e(empty($gallery->item_image_gallery_thumb_name) ? Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) : Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_thumb_name)); ?>"  class="img-fluid rounded"/>
                                                            </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <img src="<?php echo e(Storage::disk('public')->url('item/' . $item->item_image)); ?>" alt="Image" class="img-fluid rounded">
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-3">
                                        <h4 style="    text-align: center;
    padding-bottom: 20px;"> Contact Vendor </h4>
                                    <?php if(Auth::check()): ?>

                                        <?php if(Auth::user()->id != $item->user_id): ?>
                                            <?php if(Auth::user()->isAdmin()): ?>

                                                <!-- message item owner contact form -->
                                                    <form method="POST" action="<?php echo e(route('admin.messages.store')); ?>" class="sendmessage">
                                                        <?php echo csrf_field(); ?>

                                                        <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                                        <input type="hidden" name="item" value="<?php echo e($item->id); ?>">
                                                        <div class="form-group">
                                                            <input id="subject" type="text" class="form-control rounded <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                                            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-tooltip">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea rows="6" id="message" type="text" class="form-control rounded <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-tooltip">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="ps-btn">Send Message</button>
                                                        </div>
                                                    </form>
                                            <?php else: ?>
                                                <!-- message item owner contact form -->
                                                    <form method="POST" action="<?php echo e(route('user.messages.store')); ?>" class="sendmessage">
                                                        <?php echo csrf_field(); ?>

                                                        <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                                        <input type="hidden" name="item" value="<?php echo e($item->id); ?>">
                                                        <div class="form-group">
                                                            <input id="subject" type="text" class="form-control rounded <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                                            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-tooltip">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea rows="6" id="message" type="text" class="form-control rounded <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-tooltip">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="ps-btn">Send Message</button>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>

                                                <?php if(Auth::user()->isAdmin()): ?>
                                                    <a target="_blank" href="<?php echo e(route('admin.items.edit', $item->id)); ?>" class="btn btn-outline-primary btn-block rounded"><?php echo e(__('frontend.item.edit-listing')); ?></a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Auth::user()->isAdmin()): ?>
                                                    <a target="_blank" href="<?php echo e(route('admin.items.edit', $item->id)); ?>" class="btn btn-outline-primary btn-block rounded"><?php echo e(__('frontend.item.edit-listing')); ?></a>
                                                <?php else: ?>
                                                    <a target="_blank" href="<?php echo e(route('user.items.edit', $item->id)); ?>" class="btn btn-outline-primary btn-block rounded"><?php echo e(__('frontend.item.edit-listing')); ?></a>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        <?php else: ?>
                                        <!-- message item owner contact form -->
                                            <form method="POST" action="<?php echo e(route('user.messages.store')); ?>" class="sendmessage">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="recipient" value="<?php echo e($item->user_id); ?>">
                                                <input type="hidden" name="item" value="<?php echo e($item->id); ?>">
                                                <div class="form-group">
                                                    <input id="subject" type="text" class="form-control rounded <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo e(__('backend.message.subject')); ?>">
                                                    <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-tooltip">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <textarea rows="6" id="message" type="text" class="form-control rounded <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="message" placeholder="<?php echo e(__('backend.message.message-txt')); ?>"><?php echo e(old('message')); ?></textarea>
                                                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-tooltip">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="ps-btn">Send Message</button>

                                                </div>
                                            </form>
                                        <?php endif; ?>

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




<?php $__env->stopSection(); ?>

<?php $__env->startSection('msmescripts'); ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="<?php echo e(asset('frontend/vendor/leaflet/leaflet.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/vendor/justified-gallery/jquery.justifiedGallery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/vendor/colorbox/jquery.colorbox-min.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/vendor/goodshare/goodshare.min.js')); ?>"></script>

    <script>
        $(document).ready(function(){

            /**
             * Start initial map
             */
            var map = L.map('mapid-item', {
                center: [<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>],
                zoom: 13,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?php echo e($item->item_lat); ?>, <?php echo e($item->item_lng); ?>]).addTo(map);
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
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->reviewGalleryCountByReviewId($review->id)): ?>
            $("#review-image-gallery-<?php echo e($review->id); ?>").justifiedGallery({
                rowHeight : 80,
                maxRowHeight: 100,
                lastRow : 'nojustify',
                margins : 3,
                captions: false,
                randomize: true,
                rel : 'review-image-gallery-thumb-<?php echo e($review->id); ?>', //replace with 'gallery1' the rel attribute of each link
            }).on('jg.complete', function () {
                $(this).find('a').colorbox({
                    maxWidth : '95%',
                    maxHeight : '95%',
                    opacity : 0.8,
                });
            });
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            /**
             * End initial review image gallery justify gallery
             */

            /**
             * Start initial share button and share modal
             */
            $('.item-share-button').on('click', function(){
                $('#share-modal').modal('show');
            });

            <?php $__errorArgs = ['item_share_email_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_from_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_to_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <?php $__errorArgs = ['item_share_email_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            $('#share-modal').modal('show');
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
            <?php if($item_count_rating > 0): ?>
            $(".rating_stars_header").rateYo({
                spacing: "5px",
                starWidth: "23px",
                readOnly: true,
                rating: <?php echo e($item_average_rating); ?>,
            });
            <?php endif; ?>
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
    <?php echo $__env->make('frontend.partials.search.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/item.blade.php ENDPATH**/ ?>