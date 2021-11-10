<?php
/**
 * Place Order API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/orders/placeorder-api
 */

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class PlaceOrderRequest extends Request implements HasResponse
{
    use HasEnvironments;

    private string $accessToken;
    private int $productId;
    private float $denomination;
    private int $quantity = 1;
    private string $poNumber = '';
    private string $email = '';

    public function __construct(
        string $access_token,
        int $productId,
        float $denomination,
        int $quantity = 1,
        string $poNumber = '',
        string $email = ''
    ) {
        $this->accessToken = $access_token;
        $this->productId = $productId;
        $this->denomination = $denomination;
        $this->quantity = $quantity;
        $this->poNumber = $poNumber;
        $this->email = $email;

        $this->setupRequest();
    }

    public function getResponseObject(): string
    {
        return PlaceOrderResponse::class;
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
                'query' => 'plumProAPI.mutation.placeOrder',
                'tag' => 'plumProAPI',
                'variables' => [
                    'data' => [
                        'productId' => $this->productId,
                        'quantity' => $this->quantity,
                        'denomination' => $this->denomination,
                        'email' => $this->email,
                        'poNumber' => $this->poNumber
                    ]
                ]
            ],
            true
        );
    }
}
