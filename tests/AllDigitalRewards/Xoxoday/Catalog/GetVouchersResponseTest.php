<?php

namespace AllDigitalRewards\Xoxoday\Catalog;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetVouchersResponseTest extends TestCase
{
    public function testGetVouchersResponseHydratesArrayOfProducts()
    {
        $getVouchersResponse = new GetVouchersResponse(
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getVouchersResponse.json'))
        );

        self::assertIsArray($getVouchersResponse->getProducts());

        foreach ($getVouchersResponse->getProducts() as $product) {
            self::assertInstanceOf(Product::class, $product);
        }
    }
}
