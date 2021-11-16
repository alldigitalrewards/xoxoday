<?php

require __DIR__ . '/../vendor/autoload.php';

use AllDigitalRewards\Xoxoday\Catalog\GetVouchersRequest;
use AllDigitalRewards\Xoxoday\Client;
use Psr\Http\Client\ClientExceptionInterface;


$getVouchersRequest = new GetVouchersRequest(
    'some-access-token',
    10,
    1,
    '27222'
);

$xoxodayClient = new Client();
try {
    $getVouchersResponse = $xoxodayClient->request($getVouchersRequest);
    var_dump($getVouchersResponse);

    if (count($getVouchersResponse->getProducts()) === $getVouchersRequest->getLimit()) {
        // Get next page because the API returned a full page of products.
        $getVouchersRequest->setNextPage();
        $getVouchersResponse = $xoxodayClient->request($getVouchersRequest);
        var_dump($getVouchersResponse);
    }
} catch (ClientExceptionInterface | Exception $e) {
    var_dump($e->getMessage());
}


