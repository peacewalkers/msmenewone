<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="footer-heading mb-4"><strong><?php echo e(__('frontend.footer.about')); ?></strong></h2>
                        <p><?php echo clean(nl2br($site_global_settings->setting_site_about), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')); ?></p>
                    </div>

                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4"><strong><?php echo e(__('frontend.footer.navigations')); ?></strong></h2>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo e(route('page.about')); ?>"><?php echo e(__('frontend.footer.about-us')); ?></a></li>
                            <li><a href="<?php echo e(route('page.contact')); ?>"><?php echo e(__('frontend.footer.contact-us')); ?></a></li>
                            <?php if($site_global_settings->setting_page_terms_of_service_enable == \App\Setting::TERM_PAGE_ENABLED): ?>
                                <li><a href="<?php echo e(route('page.terms-of-service')); ?>"><?php echo e(__('frontend.footer.terms-of-service')); ?></a></li>
                            <?php endif; ?>
                            <?php if($site_global_settings->setting_page_privacy_policy_enable == \App\Setting::PRIVACY_PAGE_ENABLED): ?>
                                <li><a href="<?php echo e(route('page.privacy-policy')); ?>"><?php echo e(__('frontend.footer.privacy-policy')); ?></a></li>
                            <?php endif; ?>
                            <?php if($site_global_settings->setting_site_sitemap_show_in_footer == \App\Setting::SITE_SITEMAP_SHOW_IN_FOOTER): ?>
                                <li><a href="<?php echo e(route('page.sitemap.index')); ?>"><?php echo e(__('sitemap.sitemap')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4"><strong><?php echo e(__('frontend.footer.follow-us')); ?></strong></h2>
                        <?php $__currentLoopData = \App\SocialMedia::orderBy('social_media_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social_media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($social_media->social_media_link); ?>" class="pl-0 pr-3">
                                <i class="<?php echo e($social_media->social_media_icon); ?>"></i>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2 class="footer-heading mb-4"><strong><?php echo e(__('frontend.footer.posts')); ?></strong></h2>
                <ul class="list-unstyled">
                    <?php $__currentLoopData = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('page.blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>


        <div class="row pt-2 mt-5 pb-2">
            <div class="col-md-12">
                <span class="text-white pr-2 customization-footer-font-color">
                    <?php echo e(__('backend.setting.language.language')); ?>:
                </span>
                <a class="btn btn-sm btn-outline-secondary text-white rounded" id="btn-language-selector" href="#" data-toggle="modal" data-target="#language-selector-modal">
                    <?php if(app()->getLocale() == \App\Setting::LANGUAGE_AR): ?>
                        <?php echo e(__('backend.setting.language.arabic')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_CA): ?>
                        <?php echo e(__('backend.setting.language.catalan')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_DE): ?>
                        <?php echo e(__('backend.setting.language.german')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_EN): ?>
                        <?php echo e(__('backend.setting.language.english')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_ES): ?>
                        <?php echo e(__('backend.setting.language.spanish')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_FA): ?>
                        <?php echo e(__('backend.setting.language.persian-farsi')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_FR): ?>
                        <?php echo e(__('backend.setting.language.french')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_HI): ?>
                        <?php echo e(__('backend.setting.language.hindi')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_NL): ?>
                        <?php echo e(__('backend.setting.language.dutch')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_PT_BR): ?>
                        <?php echo e(__('backend.setting.language.portuguese-brazil')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_RU): ?>
                        <?php echo e(__('backend.setting.language.russian')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_TR): ?>
                        <?php echo e(__('backend.setting.language.turkish')); ?>

                    <?php elseif(app()->getLocale() == \App\Setting::LANGUAGE_ZH_CN): ?>
                        <?php echo e(__('backend.setting.language.chinese')); ?>

                    <?php endif; ?>
                </a>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        <?php echo e(__('frontend.footer.copyright')); ?> &copy; <?php echo e(empty($site_global_settings->setting_site_name) ? config('app.name', 'Laravel') : $site_global_settings->setting_site_name); ?> <?php echo e(date('Y')); ?> <?php echo e(__('frontend.footer.rights-reserved')); ?>

                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="language-selector-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('backend.setting.language.select-language')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row ml-1 mr-1">
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_AR); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.arabic')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_CA); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.catalan')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_DE); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.german')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_EN); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.english')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_ES); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.spanish')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_FA); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.persian-farsi')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_FR); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.french')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_HI); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.hindi')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_NL); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.dutch')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_PT_BR); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.portuguese-brazil')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_RU); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.russian')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_TR); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.turkish')); ?>

                            </button>
                        </form>
                    </div>
                    <div class="col-md-auto p-1">
                        <form action="<?php echo e(route('page.locale.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="text" hidden name="user_prefer_language" value="<?php echo e(\App\Setting::LANGUAGE_ZH_CN); ?>">
                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                <?php echo e(__('backend.setting.language.chinese')); ?>

                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal"><?php echo e(__('backend.shared.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>