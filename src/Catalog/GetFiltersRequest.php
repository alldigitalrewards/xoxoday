<?php
/**
 * GetFilters API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getfilters-api
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class GetFiltersRequest extends Request implements HasResponse
{
    use HasEnvironments;

    private string $accessToken = '';
    private string $filterGroupCode = '';
    private string $includeFilters = '';
    private string $excludeFilters = '';

    /**
     * @return string
     */
    public function getFilterGroupCode(): string
    {
        return $this->filterGroupCode;
    }

    /**
     * @param string $filterGroupCode
     */
    public function setFilterGroupCode(string $filterGroupCode): void
    {
        $this->filterGroupCode = $filterGroupCode;
    }

    /**
     * @return string
     */
    public function getIncludeFilters(): string
    {
        return $this->includeFilters;
    }

    /**
     * @param string $includeFilters
     */
    public function setIncludeFilters(string $includeFilters): void
    {
        $this->includeFilters = $includeFilters;
    }

    /**
     * @return string
     */
    public function getExcludeFilters(): string
    {
        return $this->excludeFilters;
    }

    /**
     * @param string $excludeFilters
     */
    public function setExcludeFilters(string $excludeFilters): void
    {
        $this->excludeFilters = $excludeFilters;
    }

    /**
     * GetFiltersRequest constructor.
     *
     * This should be extended to also accept filterGroupCode, includeFilters & excludeFilters arguments.
     *
     * @param string $access_token
     */
    public function __construct(string $access_token)
    {
        $this->accessToken = $access_token;
        $this->setupRequest();
    }

    public function getResponseObject(): string
    {
        return GetFiltersResponse::class;
    }

    private function setupRequest()
    {
        parent::__construct(
            "POST",
            $this->getBaseUrl() . "/v1/oauth/api",
            [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ],
            $this->makeJsonBody()
        );
    }

    private function makeJsonBody(): string
    {
        $data = [
            'query' => 'plumProAPI.mutation.getFilters',
            'tag' => 'plumProAPI',
            'variables' => [
                'data' => [
                    'filterGroupCode' => $this->getFilterGroupCode(),
                    'includeFilters' => $this->getIncludeFilters(),
                    'excludeFilters' => $this->getExcludeFilters(),
                ]
            ],
        ];
        return json_encode($data, true);
    }
}
