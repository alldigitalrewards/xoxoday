<?php

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class PlaceOrderRequestTest extends TestCase
{
    public function testPlaceOrderRequestReturnsPlaceOrderResponse()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/placeOrderResponse.json'))
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $httpClient = new HttpClient(['handler' => $handlerStack]);
        $xoxoClient = new Client($httpClient);

        $placeOrderRequest = new PlaceOrderRequest('some-fake-access-token', 55555, 5.00);
        $placeOrderResponse = $xoxoClient->request($placeOrderRequest);

        self::assertInstanceOf(PlaceOrderResponse::class, $placeOrderResponse);
    }
}
