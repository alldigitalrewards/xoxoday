<?php

namespace Catalog;

use AllDigitalRewards\Xoxoday\Catalog\GetFiltersRequest;
use AllDigitalRewards\Xoxoday\Catalog\GetFiltersResponse;
use AllDigitalRewards\Xoxoday\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetFiltersRequestTest extends TestCase
{
    public function testGetFiltersRequestReturnsGetFiltersResponse()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getFiltersResponse.json'))
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $httpClient = new HttpClient(['handler' => $handlerStack]);
        $xoxoClient = new Client($httpClient);

        $getFiltersRequest = new GetFiltersRequest('some-fake-access-token');
        $getFiltersResponse = $xoxoClient->request($getFiltersRequest);

        self::assertInstanceOf(GetFiltersResponse::class, $getFiltersResponse);
    }
}
