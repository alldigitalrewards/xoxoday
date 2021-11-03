<?php
require __DIR__ . '/../vendor/autoload.php';

$getFiltersRequest = new \AllDigitalRewards\Xoxoday\Catalog\GetFiltersRequest('some-fake-access-token');

$xoxodayClient = new \AllDigitalRewards\Xoxoday\Client();
$getFiltersResponse = $xoxodayClient->request($getFiltersRequest);

var_dump($getFiltersResponse);
