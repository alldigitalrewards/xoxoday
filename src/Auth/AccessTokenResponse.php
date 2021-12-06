<?php

namespace AllDigitalRewards\Xoxoday\Auth;

use AllDigitalRewards\Xoxoday\AbstractEntity;
use Psr\Http\Message\ResponseInterface;

class AccessTokenResponse extends AbstractEntity
{
    protected string $access_token = '';
    protected string $token_type = '';
    protected string $expires_in = '';
    protected string $refresh_token = '';

    public function __construct(ResponseInterface $response)
    {
        parent::__construct(
            json_decode($response->getBody())
        );
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param mixed $access_token
     */
    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return mixed
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * @param mixed $token_type
     */
    public function setTokenType($token_type): void
    {
        $this->token_type = $token_type;
    }

    /**
     * @return mixed
     */
    public function getExpiresIn()
    {
        return $this->expires_in;
    }

    /**
     * @param mixed $expires_in
     */
    public function setExpiresIn($expires_in): void
    {
        $this->expires_in = $expires_in;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * @param mixed $refresh_token
     */
    public function setRefreshToken($refresh_token): void
    {
        $this->refresh_token = $refresh_token;
    }
}
