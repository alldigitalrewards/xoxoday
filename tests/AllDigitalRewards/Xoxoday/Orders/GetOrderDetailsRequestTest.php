<?php

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetOrderDetailsRequestTest extends TestCase
{
    public function testGetOrderDetailsRequestReturnsGetOrderDetailsResponse()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getOrderDetailsResponse.json'))
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $httpClient = new HttpClient(['handler' => $handlerStack]);
        $xoxoClient = new Client($httpClient);

        $getOrderDetailsRequest = new GetOrderDetailsRequest('some-fake-access-token', 55555);
        $getOrderDetailsResponse = $xoxoClient->request($getOrderDetailsRequest);

        self::assertInstanceOf(GetOrderDetailsResponse::class, $getOrderDetailsResponse);
    }
}
