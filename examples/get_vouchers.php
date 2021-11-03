<?php
require __DIR__ . '/../vendor/autoload.php';

$getVouchersRequest = new \AllDigitalRewards\Xoxoday\Catalog\GetVouchersRequest('some-fake-access-token');

$xoxodayClient = new \AllDigitalRewards\Xoxoday\Client();
$getVouchersResponse = $xoxodayClient->request($getVouchersRequest);
var_dump($getVouchersResponse);

if (count($getVouchersResponse->getProducts()) === $getVouchersRequest->getLimit()) {
    // Get next page because the API returned a full page of products.
    $getVouchersRequest->setNextPage();
    $getVouchersResponse = $xoxodayClient->request($getVouchersRequest);
    var_dump($getVouchersResponse);
}


