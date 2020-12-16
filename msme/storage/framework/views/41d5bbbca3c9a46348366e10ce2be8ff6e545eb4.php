<?php $__env->startSection('styles'); ?>

    <!-- End Google reCAPTCHA version 2 -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="ps-page--single" id="contact-us">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>

        <div class="ps-contact-info py-5">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Contact Us For Any Questions</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                            <div class="ps-block--contact-info">
                                <h4>Working Office</h4>
                                <h5>M/s Shiv Enterprises  :</h5>
                                    <p>303, Sankalp Apartments, Sector–omicron-1
                                    Greater Noida- 201303, U.P.</p>
                                <a href="tel:9971486943">+91-9971486943</a>
                                <a href="mailto:contact@msmelist.com">Email: contact@msmelist.com</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                            <div class="ps-block--contact-info">
                                <h4>Registered Office</h4>
                                <h5>M/s Shiv Enterprises :</h5>
                                <p>B/134, Shivkunj, Lohia Nagar,
                                    Kankarbagh Colony, Patna – 800020, Bihar</p>
                                <a href="tel:9971486943">+91-9971486943</a>
                                <a href="mailto:contact@msmelist.com">Email: contact@msmelist.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-contact-form py-5">
            <div class="container">
                    <form action="<?php echo e(route('page.contact.do')); ?>" class="ps-form--contact-us" method="POST">
                    <?php echo csrf_field(); ?>
                    <h3>Get In Touch</h3>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="first_name"  type="text" placeholder="First Name *">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="last_name"  type="text" placeholder="Last Name *">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="9876543210 *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="subject"  type="text" placeholder="Subject *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="message"  placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group submit">
                        <button class="ps-btn">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('msme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/msme/contact.blade.php ENDPATH**/ ?>