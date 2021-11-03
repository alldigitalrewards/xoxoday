<?php
require __DIR__ . '/../vendor/autoload.php';

$accessTokenRequest = new \AllDigitalRewards\Xoxoday\Auth\AccessTokenRequest(
    'some-fake-client-id',
    'some-fake-client-secret',
    'some-fake-refresh-token'
);

$XoxoClient = new \AllDigitalRewards\Xoxoday\Client();
$accessTokenResponse = $XoxoClient->request($accessTokenRequest);

var_dump($accessTokenResponse);

