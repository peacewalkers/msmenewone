<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800"><?php echo e(__('razorpay_setting.edit-razorpay-setting')); ?></h1>
            <p class="mb-4"><?php echo e(__('razorpay_setting.edit-razorpay-setting-desc')); ?></p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="<?php echo e(route('admin.settings.payment.razorpay.update')); ?>" class="">
                        <?php echo csrf_field(); ?>

                        <div class="row form-group">
                            <div class="col-12">
                                <?php if($all_razorpay_settings->setting_site_razorpay_enable == \App\Setting::SITE_PAYMENT_RAZORPAY_ENABLE): ?>
                                    <span class="pl-2 pr-2 pt-1 pb-1 bg-success text-white rounded"><?php echo e(__('razorpay_setting.razorpay-enabled')); ?></span>
                                <?php else: ?>
                                    <span class="pl-2 pr-2 pt-1 pb-1 bg-warning text-white rounded"><?php echo e(__('razorpay_setting.razorpay-disabled')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-12">
                                <span><?php echo e(__('razorpay.webhook')); ?>: <?php echo e(route('user.razorpay.notify')); ?></span>
                            </div>
                        </div>
                        <hr>

                        <div class="row form-group">
                            <div class="col-12">

                                <div class="custom-control custom-checkbox">
                                    <input value="<?php echo e(\App\Setting::SITE_PAYMENT_RAZORPAY_ENABLE); ?>" name="setting_site_razorpay_enable" type="checkbox" class="custom-control-input" id="setting_site_razorpay_enable" <?php echo e((old('setting_site_razorpay_enable') ? old('setting_site_razorpay_enable') : $all_razorpay_settings->setting_site_razorpay_enable) == \App\Setting::SITE_PAYMENT_RAZORPAY_ENABLE ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="setting_site_razorpay_enable"><?php echo e(__('razorpay_setting.enable-razorpay')); ?></label>
                                </div>
                                <?php $__errorArgs = ['setting_site_razorpay_enable'];
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
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4 col-sm-12">

                                <label class="text-black" for="setting_site_razorpay_api_key"><?php echo e(__('razorpay.api-key')); ?></label>
                                <input id="setting_site_razorpay_api_key" type="text" class="form-control <?php $__errorArgs = ['setting_site_razorpay_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="setting_site_razorpay_api_key" value="<?php echo e(old('setting_site_razorpay_api_key') ? old('setting_site_razorpay_api_key') : $all_razorpay_settings->setting_site_razorpay_api_key); ?>">
                                <?php $__errorArgs = ['setting_site_razorpay_api_key'];
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

                            <div class="col-md-4 col-sm-12">

                                <label class="text-black" for="setting_site_razorpay_api_secret"><?php echo e(__('razorpay.api-secret')); ?></label>
                                <input id="setting_site_razorpay_api_secret" type="text" class="form-control <?php $__errorArgs = ['setting_site_razorpay_api_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="setting_site_razorpay_api_secret" value="<?php echo e(old('setting_site_razorpay_api_secret') ? old('setting_site_razorpay_api_secret') : $all_razorpay_settings->setting_site_razorpay_api_secret); ?>">
                                <?php $__errorArgs = ['setting_site_razorpay_api_secret'];
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

                            <div class="col-md-4 col-sm-12">
                                <label class="text-black" for="setting_site_razorpay_currency"><?php echo e(__('razorpay.currency')); ?></label>
                                <select class="custom-select <?php $__errorArgs = ['setting_site_razorpay_currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="setting_site_razorpay_currency">
                                    <option value="INR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'INR' ? 'selected' : ''); ?>>Indian rupee</option>

                                    <option value="AED" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'AED' ? 'selected' : ''); ?>>United Arab Emirates Dirham</option>
                                    <option value="ALL" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'ALL' ? 'selected' : ''); ?>>Albanian lek</option>
                                    <option value="AMD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'AMD' ? 'selected' : ''); ?>>Armenian dram</option>
                                    <option value="ARS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'ARS' ? 'selected' : ''); ?>>Argentine peso</option>
                                    <option value="AUD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'AUD' ? 'selected' : ''); ?>>Australian dollar</option>
                                    <option value="AWG" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'AWG' ? 'selected' : ''); ?>>Aruban florin</option>
                                    <option value="BBD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BBD' ? 'selected' : ''); ?>>Barbadian dollar</option>
                                    <option value="BDT" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BDT' ? 'selected' : ''); ?>>Bangladeshi taka</option>
                                    <option value="BMD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BMD' ? 'selected' : ''); ?>>Bermudian dollar</option>
                                    <option value="BND" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BND' ? 'selected' : ''); ?>>Brunei dollar</option>
                                    <option value="BOB" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BOB' ? 'selected' : ''); ?>>Bolivian boliviano</option>
                                    <option value="BSD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BSD' ? 'selected' : ''); ?>>Bahamian dollar</option>
                                    <option value="BWP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BWP' ? 'selected' : ''); ?>>Botswana pula</option>
                                    <option value="BZD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'BZD' ? 'selected' : ''); ?>>Belize dollar</option>
                                    <option value="CAD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'CAD' ? 'selected' : ''); ?>>Canadian dollar</option>
                                    <option value="CHF" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'CHF' ? 'selected' : ''); ?>>Swiss franc</option>
                                    <option value="CNY" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'CNY' ? 'selected' : ''); ?>>Chinese yuan renminbi</option>
                                    <option value="COP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'COP' ? 'selected' : ''); ?>>Colombian peso</option>
                                    <option value="CRC" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'CRC' ? 'selected' : ''); ?>>Costa Rican colon</option>
                                    <option value="CUP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'CUP' ? 'selected' : ''); ?>>Cuban peso</option>
                                    <option value="CZK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'CZK' ? 'selected' : ''); ?>>Czech koruna</option>
                                    <option value="DKK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'DKK' ? 'selected' : ''); ?>>Danish krone</option>
                                    <option value="DOP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'DOP' ? 'selected' : ''); ?>>Dominican peso</option>
                                    <option value="DZD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'DZD' ? 'selected' : ''); ?>>Algerian dinar</option>
                                    <option value="EGP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'EGP' ? 'selected' : ''); ?>>Egyptian pound</option>
                                    <option value="ETB" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'ETB' ? 'selected' : ''); ?>>Ethiopian birr</option>
                                    <option value="EUR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'EUR' ? 'selected' : ''); ?>>European euro</option>
                                    <option value="FJD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'FJD' ? 'selected' : ''); ?>>Fijian dollar</option>
                                    <option value="GBP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'GBP' ? 'selected' : ''); ?>>Pound sterling</option>
                                    <option value="GIP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'GIP' ? 'selected' : ''); ?>>Gibraltar pound</option>
                                    <option value="GHS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'GHS' ? 'selected' : ''); ?>>Ghanian Cedi</option>
                                    <option value="GMD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'GMD' ? 'selected' : ''); ?>>Gambian dalasi</option>
                                    <option value="GTQ" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'GTQ' ? 'selected' : ''); ?>>Guatemalan quetzal</option>
                                    <option value="GYD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'GYD' ? 'selected' : ''); ?>>Guyanese dollar</option>
                                    <option value="HKD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'HKD' ? 'selected' : ''); ?>>Hong Kong dollar</option>
                                    <option value="HNL" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'HNL' ? 'selected' : ''); ?>>Honduran lempira</option>
                                    <option value="HRK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'HRK' ? 'selected' : ''); ?>>Croatian kuna</option>
                                    <option value="HTG" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'HTG' ? 'selected' : ''); ?>>Haitian gourde</option>
                                    <option value="HUF" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'HUF' ? 'selected' : ''); ?>>Hungarian forint</option>
                                    <option value="IDR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'IDR' ? 'selected' : ''); ?>>Indonesian rupiah</option>
                                    <option value="ILS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'ILS' ? 'selected' : ''); ?>>Israeli new shekel</option>
                                    <option value="JMD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'JMD' ? 'selected' : ''); ?>>Jamaican dollar</option>
                                    <option value="KES" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'KES' ? 'selected' : ''); ?>>Kenyan shilling</option>
                                    <option value="KGS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'KGS' ? 'selected' : ''); ?>>Kyrgyzstani som</option>
                                    <option value="KHR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'KHR' ? 'selected' : ''); ?>>Cambodian riel</option>
                                    <option value="KYD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'KYD' ? 'selected' : ''); ?>>Cayman Islands dollar</option>
                                    <option value="KZT" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'KZT' ? 'selected' : ''); ?>>Kazakhstani tenge</option>
                                    <option value="LAK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'LAK' ? 'selected' : ''); ?>>Lao kip</option>
                                    <option value="LBP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'LBP' ? 'selected' : ''); ?>>Lebanese pound</option>
                                    <option value="LKR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'LKR' ? 'selected' : ''); ?>>Sri Lankan rupee</option>
                                    <option value="LRD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'LRD' ? 'selected' : ''); ?>>Liberian dollar</option>
                                    <option value="LSL" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'LSL' ? 'selected' : ''); ?>>Lesotho loti</option>
                                    <option value="MAD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MAD' ? 'selected' : ''); ?>>Moroccan dirham</option>
                                    <option value="MDL" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MDL' ? 'selected' : ''); ?>>Moldovan leu</option>
                                    <option value="MKD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MKD' ? 'selected' : ''); ?>>Macedonian denar</option>
                                    <option value="MMK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MMK' ? 'selected' : ''); ?>>Myanmar kyat</option>
                                    <option value="MNT" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MNT' ? 'selected' : ''); ?>>Mongolian tugrik</option>
                                    <option value="MOP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MOP' ? 'selected' : ''); ?>>Macanese pataca</option>
                                    <option value="MUR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MUR' ? 'selected' : ''); ?>>Mauritian rupee</option>
                                    <option value="MVR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MVR' ? 'selected' : ''); ?>>Maldivian rufiyaa</option>
                                    <option value="MWK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MWK' ? 'selected' : ''); ?>>Malawian kwacha</option>
                                    <option value="MXN" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MXN' ? 'selected' : ''); ?>>Mexican peso</option>
                                    <option value="MYR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'MYR' ? 'selected' : ''); ?>>Malaysian ringgit</option>
                                    <option value="NAD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'NAD' ? 'selected' : ''); ?>>Namibian dollar</option>
                                    <option value="NGN" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'NGN' ? 'selected' : ''); ?>>Nigerian naira</option>
                                    <option value="NIO" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'NIO' ? 'selected' : ''); ?>>Nicaraguan cordoba</option>
                                    <option value="NOK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'NOK' ? 'selected' : ''); ?>>Norwegian krone</option>
                                    <option value="NPR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'NPR' ? 'selected' : ''); ?>>Nepalese rupee</option>
                                    <option value="NZD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'NZD' ? 'selected' : ''); ?>>New Zealand dollar</option>
                                    <option value="PEN" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'PEN' ? 'selected' : ''); ?>>Peruvian sol</option>
                                    <option value="PGK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'PGK' ? 'selected' : ''); ?>>Papua New Guinean kina</option>
                                    <option value="PHP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'PHP' ? 'selected' : ''); ?>>Philippine peso</option>
                                    <option value="PKR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'PKR' ? 'selected' : ''); ?>>Pakistani rupee</option>
                                    <option value="QAR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'QAR' ? 'selected' : ''); ?>>Qatari riyal</option>
                                    <option value="RUB" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'RUB' ? 'selected' : ''); ?>>Russian ruble</option>
                                    <option value="SAR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SAR' ? 'selected' : ''); ?>>Saudi Arabian riyal</option>
                                    <option value="SCR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SCR' ? 'selected' : ''); ?>>Seychellois rupee</option>
                                    <option value="SEK" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SEK' ? 'selected' : ''); ?>>Swedish krona</option>
                                    <option value="SGD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SGD' ? 'selected' : ''); ?>>Singapore dollar</option>
                                    <option value="SLL" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SLL' ? 'selected' : ''); ?>>Sierra Leonean leone</option>
                                    <option value="SOS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SOS' ? 'selected' : ''); ?>>Somali shilling</option>
                                    <option value="SSP" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SSP' ? 'selected' : ''); ?>>South Sudanese pound</option>
                                    <option value="SVC" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SVC' ? 'selected' : ''); ?>>Salvadoran colón</option>
                                    <option value="SZL" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'SZL' ? 'selected' : ''); ?>>Swazi lilangeni</option>
                                    <option value="THB" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'THB' ? 'selected' : ''); ?>>Thai baht</option>
                                    <option value="TTD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'TTD' ? 'selected' : ''); ?>>Trinidad and Tobago dollar</option>
                                    <option value="TZS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'TZS' ? 'selected' : ''); ?>>Tanzanian shilling</option>
                                    <option value="USD" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'USD' ? 'selected' : ''); ?>>United States dollar</option>
                                    <option value="UYU" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'UYU' ? 'selected' : ''); ?>>Uruguayan peso</option>
                                    <option value="UZS" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'UZS' ? 'selected' : ''); ?>>Uzbekistani so'm</option>
                                    <option value="YER" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'YER' ? 'selected' : ''); ?>>Yemeni rial</option>
                                    <option value="ZAR" <?php echo e($all_razorpay_settings->setting_site_razorpay_currency == 'ZAR' ? 'selected' : ''); ?>>South African rand</option>
                                </select>
                                <small class="form-text text-muted">
                                    <?php echo e(__('razorpay.currency-help')); ?>

                                </small>
                                <?php $__errorArgs = ['setting_site_razorpay_currency'];
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
                        </div>

                        <div class="row form-group justify-content-between">
                            <div class="col-8">
                                <button type="submit" class="btn btn-success text-white">
                                    <?php echo e(__('backend.shared.update')); ?>

                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/admin/setting/payment/razorpay/edit.blade.php ENDPATH**/ ?>