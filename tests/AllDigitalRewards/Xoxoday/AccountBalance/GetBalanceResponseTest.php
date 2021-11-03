<?php

namespace AccountBalance;

use AllDigitalRewards\Xoxoday\AccountBalance\GetBalanceResponse;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetBalanceResponseTest extends TestCase
{
    public function testGetBalanceResponseHydratesDataProperly()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/fixtures/getBalanceResponse.json'));
        $response = new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getBalanceResponse.json'));
        $getBalanceResponse = new GetBalanceResponse($response);

        self::assertSame($data->data->getBalance->data->points, $getBalanceResponse->getPoints());
        self::assertSame($data->data->getBalance->data->value, $getBalanceResponse->getValue());
        self::assertSame($data->data->getBalance->data->currency, $getBalanceResponse->getCurrency());
    }
}
