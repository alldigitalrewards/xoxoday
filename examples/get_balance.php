<?php
require __DIR__ . '/../vendor/autoload.php';

$getBalanceRequest = new \AllDigitalRewards\Xoxoday\AccountBalance\GetBalanceRequest('some-fake-access-token');

$xoxodayClient = new \AllDigitalRewards\Xoxoday\Client();
$getBalanceResponse = $xoxodayClient->request($getBalanceRequest);

var_dump($getBalanceResponse);