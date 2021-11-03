<?php

namespace Catalog;

use AllDigitalRewards\Xoxoday\Catalog\FilterGroup;
use AllDigitalRewards\Xoxoday\Catalog\GetFiltersRequest;
use AllDigitalRewards\Xoxoday\Catalog\GetFiltersResponse;
use AllDigitalRewards\Xoxoday\Client;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetFiltersResponseTest extends TestCase
{
    public function testGetFiltersResponseReturnsArrayOfFilterGroups()
    {
        $getFiltersResponse = new GetFiltersResponse(
            new Response(200, [], file_get_contents(__DIR__ . '/fixtures/getFiltersResponse.json'))
        );

        $filterGroups = $getFiltersResponse->getFilters();
        self::assertIsArray($filterGroups);

        foreach ($filterGroups as $filterGroup) {
            self::assertInstanceOf(FilterGroup::class, $filterGroup);
        }
    }
}
