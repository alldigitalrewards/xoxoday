<?php

namespace AllDigitalRewards\Xoxoday\Catalog;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testProductHydratesDataProperly()
    {
        $productData = json_decode(file_get_contents(__DIR__ . '/fixtures/product.json'));
        $product = new Product($productData);

        self::assertSame($productData->productId, $product->getProductId());
        // bla bla bla
    }
}
