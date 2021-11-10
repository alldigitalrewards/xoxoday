<?php
require __DIR__ . '/../vendor/autoload.php';

$placeOrderRequest = new \AllDigitalRewards\Xoxoday\Orders\PlaceOrderRequest(
    'some-access-token',
    29877,
    20,
    1
);

$xoxodayClient = new \AllDigitalRewards\Xoxoday\Client();
try {
    $placeOrderResponse = $xoxodayClient->request($placeOrderRequest);
    var_dump($placeOrderResponse->getOrder());
} catch (\Psr\Http\Client\ClientExceptionInterface $e) {
    var_dump($e->getMessage());
}
