<?php

namespace Catalog;

use AllDigitalRewards\Xoxoday\Catalog\GetFiltersRequest;
use AllDigitalRewards\Xoxoday\Catalog\GetFiltersResponse;
use AllDigitalRewards\Xoxoday\Catalog\GetVouchersRequest;
use AllDigitalRewards\Xoxoday\Catalog\GetVouchersResponse;
use AllDigitalRewards\Xoxoday\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetVouchersRequestTest extends TestCase
{
    public function testGetVouchersRequestReturnsGetVouchersResponse()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getVouchersResponse.json'))
        ]);

        $handlerStack = HandlerStack::create($mockHandler);
        $httpClient = new HttpClient(['handler' => $handlerStack]);
        $xoxoClient = new Client($httpClient);

        $getVouchersRequest = new GetVouchersRequest('some-fake-access-token');
        $getVouchersResponse = $xoxoClient->request($getVouchersRequest);

        self::assertInstanceOf(GetVouchersResponse::class, $getVouchersResponse);
    }
}
