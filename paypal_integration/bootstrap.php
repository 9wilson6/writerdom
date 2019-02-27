
<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
require '../vendor/autoload.php';
// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;
// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AYJ-dW-Wx_Ubt7S12Fvl5uhodfyvQH3V8HOZxqN521Iazv8ptRwtTcMyUEyKdno4ZzfenglKKS2zKsLj',
    'client_secret' => 'EBnnXZt7SEWvdjOisjyfc_K1mFsnuv5TROEenqrCzmFwCGwa3oLhpQdIh_o_RhMRTZiRmNWf6lVzeJw-',
    'return_url' => 'http://localhost/writerdom/paypal_integration/payment_success.php',
    'cancel_url' => 'http://localhost/writerdom/paypal_integration/payment_cancel.php'
];
// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'user',
    'password' => '',
    'name' => 'writerdom'
];
$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);
/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );
    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);
    return $apiContext;
}
