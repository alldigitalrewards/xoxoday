<?php
/**
 * GetFilters API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getfilters-api
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractEntity;
use Psr\Http\Message\ResponseInterface;

class GetFiltersResponse extends AbstractEntity
{
    protected array $filters;

    public function __construct(ResponseInterface $response)
    {
        return $this->extractData($response);
    }

    private function extractData(ResponseInterface $response)
    {
        $data = json_decode($response->getBody());

        if (empty($data->data->getFilters->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new \Exception('Response data hates you.');
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
