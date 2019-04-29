<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
require '../vendor/autoload.php';
// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = false;
// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AabrDvP19Q9tF3hQolvwJLXxqDHM8_ERiVr7LF72uW-ew2VQ47iX6SKQmajRGOz97XCjxKZr5DV3svtO',
    'client_secret' => 'EIpu3BW8gedwk2pNIb6QG76U0IGq1qDagLhf4yDd4Hkhqwe2AyROoeQuKMClJrTMR_XMWn3AUdEcD4s1',
    'return_url' => 'https://www.perfectgrader.com/paypal_integration/payment_success',
    'cancel_url' => 'https://www.perfectgrader.com/student/my-homework'
];
// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
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
