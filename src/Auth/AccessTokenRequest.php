<?php


namespace AllDigitalRewards\Xoxoday\Auth;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class AccessTokenRequest extends Request implements HasResponse
{
    use HasEnvironments;

    public function __construct(string $client_id, string $client_secret, string $refresh_token)
    {
        parent::__construct(
            "POST",
            $this->getBaseUrl() . "/v1/oauth/token/user",
            ['Content-Type' => 'application/json'],
            '{
	"grant_type":"refresh_token",
	"refresh_token":"' . $refresh_token . '",
	"client_id":"' . $client_id . '",
	"client_secret":"' . $client_secret . '"
}'
        );
    }

    public function getResponseObject(): string
    {
        return AccessTokenResponse::class;
    }
}
