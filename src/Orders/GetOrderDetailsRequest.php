<?php

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class GetOrderDetailsRequest extends Request implements HasResponse
{
    use HasEnvironments;

    private string $accessToken;
    private int $orderId;

    public function __construct(string $access_token, int $order_id)
    {
        $this->accessToken = $access_token;
        $this->orderId = $order_id;
        $this->setupRequest();
    }

    public function getResponseObject(): string
    {
        return GetOrderDetailsResponse::class;
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
        return json_encode(
            [
                'query' => 'plumProAPI.mutation.getOrderDetails',
                'tag' => 'plumProAPI',
                'variables' => [
                    'data' => [
                        'orderId' => $this->orderId,
                    ]
                ]
            ],
            true
        );
    }
}