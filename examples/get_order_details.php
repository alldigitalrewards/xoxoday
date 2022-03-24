<?php
require __DIR__ . '/../vendor/autoload.php';

$getOrderDetailsRequest = new \AllDigitalRewards\Xoxoday\Orders\GetOrderDetailsRequest(
    'some-fake-access-token',
    123456789
);

$xoxodayClient = new \AllDigitalRewards\Xoxoday\Client();
try {
    $getOrderDetailsResponse = $xoxodayClient->request($getOrderDetailsRequest);
    var_dump($getOrderDetailsResponse->getOrder());
} catch (\Psr\Http\Client\ClientExceptionInterface $e) {
    var_dump($e->getMessage());
}
