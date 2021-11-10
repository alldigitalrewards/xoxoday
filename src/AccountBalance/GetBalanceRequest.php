<?php
/**
 * GetBalance API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/account-balance/getbalance-api
 */

namespace AllDigitalRewards\Xoxoday\AccountBalance;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class GetBalanceRequest extends Request implements HasResponse
{
    use HasEnvironments;

    private string $accessToken = '';

    public function __construct(string $access_token)
    {
        $this->accessToken = $access_token;
        $this->setupRequest();
    }

    public function getResponseObject(): string
    {
        return GetBalanceResponse::class;
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
            'query' => 'plumProAPI.query.getBalance',
            'tag' => 'plumProAPI',
            'variables' => [
                'data' => []
            ],
        ];
        return json_encode($data, true);
    }
}
