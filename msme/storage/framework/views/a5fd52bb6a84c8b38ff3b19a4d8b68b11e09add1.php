<html>
<body>
<span id="rzp-button"><?php echo e(__('razorpay.pay-redirect-message')); ?></span>
<br>
<br>
<form action="<?php echo e(route('user.razorpay.checkout.cancel')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="invoice_num" value="<?php echo e($invoice_num); ?>">
    <button type="submit" class="btn-link"><?php echo e(__('razorpay.cancel-payment')); ?></button>
</form>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "<?php echo e($razorpay_api_key); ?>", // Enter the Key ID generated from the Dashboard
        "subscription_id": "<?php echo e($razorpay_subscription_id); ?>",
        "name": "<?php echo e($razorpay_plan_name); ?>",
        "description": "<?php echo e($razorpay_plan_item_desc); ?>",
        "handler": function (response){

            console.log(response.razorpay_payment_id);
            console.log(response.razorpay_signature);

            // similar behavior as an HTTP redirect
            window.location.replace("<?php echo e(route('user.razorpay.checkout.success', ['plan_id' => $plan_id, 'subscription_id' => $subscription_id, 'invoice_num' => $invoice_num])); ?>" + "?razorpay_payment_id=" + response.razorpay_payment_id + "&razorpay_subscription_id=<?php echo e($razorpay_subscription_id); ?>" + "&razorpay_signature=" + response.razorpay_signature + "&razorpay_plan_id=<?php echo e($razorpay_plan_id); ?>");
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();

    // document.getElementById('rzp-button').onclick = function(e){
    //     rzp1.open();
    // }
</script>
</body>
</html>
<?php /**PATH C:\laragon\www\msmenewone\msme\resources\views/backend/user/subscription/payment/razorpay/do-checkout.blade.php ENDPATH**/ ?>