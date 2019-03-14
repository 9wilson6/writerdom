<?php
$system_mode = 'test'; // set 'test' for sandbox and leave blank for real payments.
$paypal_seller = 'hustlemail96@gmail.com'; //Your PayPal account email address

$payment_return_success = 'http://localhost/writerdom/paypal_integration/payment_success.php?'; //after payment, user will be redirected in this page, change with your own url
$payment_return_cancel = 'http://localhost/writerdom/paypal_integration/payment_cancel.php?'; //if payment cancelled, user will be redirected in this page, change with your own url

if ($system_mode == 'test') {$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; }
else {$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';}
 ?>
