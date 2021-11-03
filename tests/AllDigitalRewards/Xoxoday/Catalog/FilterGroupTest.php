<?php

namespace Catalog;

use AllDigitalRewards\Xoxoday\Catalog\Filter;
use AllDigitalRewards\Xoxoday\Catalog\FilterGroup;
use PHPUnit\Framework\TestCase;

class FilterGroupTest extends TestCase
{
    public function testFilterGroupProperlyPrimaryProperties()
    {
        $filterGroupData = json_decode(
            file_get_contents(__DIR__ . '/fixtures/filterGroup.json')
        );

        $filterGroup = new FilterGroup($filterGroupData);

        self::assertSame($filterGroupData->filterGroupName, $filterGroup->getFilterGroupName());
        self::assertSame($filterGroupData->filterGroupDescription, $filterGroup->getFilterGroupDescription());
        self::assertSame($filterGroupData->filterGroupCode, $filterGroup->getFilterGroupCode());
    }

    public function testFilterGroupFiltersReturnsArrayOfFilters()
    {
        $filterGroupData = json_decode(
            file_get_contents(__DIR__ . '/fixtures/filterGroup.json')
        );

        $filterGroup = new FilterGroup($filterGroupData);
        self::assertIsArray($filterGroup->getFilters());

        foreach ($filterGroup->getFilters() as $filter) {
            self::assertInstanceOf(Filter::class, $filter);
        }
    }
}
