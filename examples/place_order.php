<?php
require __DIR__ . '/../vendor/autoload.php';

$placeOrderRequest = new \AllDigitalRewards\Xoxoday\Orders\PlaceOrderRequest(
    'some-fake-access-token',
    29877,
    20,
    1
);

$xoxodayClient = new \AllDigitalRewards\Xoxoday\Client();
$placeOrderResponse = $xoxodayClient->request($placeOrderRequest);
var_dump($placeOrderResponse);
