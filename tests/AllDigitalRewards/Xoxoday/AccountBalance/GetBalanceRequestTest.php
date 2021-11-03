<?php

namespace AccountBalance;

use AllDigitalRewards\Xoxoday\AccountBalance\GetBalanceRequest;
use AllDigitalRewards\Xoxoday\AccountBalance\GetBalanceResponse;
use AllDigitalRewards\Xoxoday\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetBalanceRequestTest extends TestCase
{
    public function testClientRequestReturnsGetBalanceResponse()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getBalanceResponse.json'))
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $httpClient = new HttpClient(['handler' => $handlerStack]);
        $xoxoClient = new Client($httpClient);

        $getBalanceRequest = new GetBalanceRequest('some-fake-access-token');
        $getBalanceResponse = $xoxoClient->request($getBalanceRequest);

        self::assertInstanceOf(GetBalanceResponse::class, $getBalanceResponse);
    }
}
