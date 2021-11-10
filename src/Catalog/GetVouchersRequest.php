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

    public function __construct(string $access_token)
    {
        $this->accessToken = $access_token;
        $this->setupRequest();
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
                    'includeProducts' => "",
                    'excludeProducts' => "",
                    'sort' => [
                        'field' => '',
                        'order' => '',
                    ],
                    'filters' => [
                        [
                            'key' => 'currencyCode',
                            'value' => 'USD'
                        ],
                        [
                            'key' => 'productName',
                            'value' => ''
                        ],
                    ]
                ]
            ],
        ];
        return json_encode($data, true);
    }
}
