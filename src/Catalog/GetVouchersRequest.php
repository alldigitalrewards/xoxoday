<?php
/**
 * GetVouchers API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getvouchers-api
 *
 * @todo - Add support for filters and additional arguments; includeProducts, excludeProducts, sort/order.
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasPages;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class GetVouchersRequest extends Request implements HasResponse
{
    use HasPages, HasEnvironments;

    private string $accessToken = '';
    private string $includeProducts = '';
    private string $excludeProducts = '';

    public function __construct(
        string $access_token,
        int $limit = 10,
        int $page = 1,
        string $includeProducts = '',
        string $excludeProducts = '',
    ) {
        $this->accessToken = $access_token;
        $this->setLimit($limit);
        $this->setPage($page);
        $this->setIncludeProducts($includeProducts);
        $this->setExcludeProducts($excludeProducts);
        $this->setupRequest();
    }

    /**
     * @return string
     */
    public function getIncludeProducts(): string
    {
        return $this->includeProducts;
    }

    /**
     * @param string $includeProducts
     */
    public function setIncludeProducts(string $includeProducts): void
    {
        $this->includeProducts = $includeProducts;
    }

    /**
     * @return string
     */
    public function getExcludeProducts(): string
    {
        return $this->excludeProducts;
    }

    /**
     * @param string $excludeProducts
     */
    public function setExcludeProducts(string $excludeProducts): void
    {
        $this->excludeProducts = $excludeProducts;
    }

    public function getResponseObject(): string
    {
        return GetVouchersResponse::class;
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
            'query' => 'plumProAPI.mutation.getVouchers',
            'tag' => 'plumProAPI',
            'variables' => [
                'data' => [
                    'limit' => $this->getLimit(),
                    'page' => $this->getPage(),
                    'exchangeRate' => 1,
                    'includeProducts' => $this->getIncludeProducts(),
                    'excludeProducts' => $this->getExcludeProducts(),
                    'sort' => [
                        'field' => '',
                        'order' => '',
                    ],
                    'filters' => []
                ]
            ],
        ];
        return json_encode($data, true);
    }
}
