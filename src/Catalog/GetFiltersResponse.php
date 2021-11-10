<?php
/**
 * GetFilters API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getfilters-api
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractResponse;
use Exception;
use stdClass;

class GetFiltersResponse extends AbstractResponse
{
    protected array $filters;

    /**
     * @throws Exception
     */
    public function extractData(stdClass $data): AbstractResponse
    {
        if (empty($data->data->getFilters->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new Exception('No Filters found');
        }

        $this->setFilters($data->data->getFilters->data);

        return $this;
    }

    /**
     * @param array $filters
     */
    private function setFilters(array $filters)
    {
        foreach ($filters as $filter) {
            $this->filters[] = new FilterGroup($filter);
        }
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}
