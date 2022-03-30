<?php

namespace AllDigitalRewards\Xoxoday\Auth;

use AllDigitalRewards\Xoxoday\AbstractEntity;
use Psr\Http\Message\ResponseInterface;
use DateTime;

class AccessTokenResponse extends AbstractEntity
{
    protected string $access_token = '';
    protected string $token_type = '';
    protected int $expires_in = 0;
    protected string $refresh_token = '';

    /**
     * Quite unfortunately this does not come from the XOXODay API.
     * This is generated when the object is instantiated and used when the complete object is stored in a cache.
     *
     * @var DateTime $created_on
     */
    protected \DateTime $created_on;

    public function __construct(ResponseInterface $response)
    {
        $this->created_on = new \DateTime();

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
     * @param string $access_token
     */
    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * @param string $token_type
     */
    public function setTokenType($token_type): void
    {
        $this->token_type = $token_type;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expires_in;
    }

    /**
     * @param int $expires_in
     */
    public function setExpiresIn(int $expires_in): void
    {
        $this->expires_in = $expires_in;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * @param string $refresh_token
     */
    public function setRefreshToken($refresh_token): void
    {
        $this->refresh_token = $refresh_token;
    }

    /**
     * @return DateTime
     */
    public function getCreatedOn(): DateTime
    {
        return $this->created_on;
    }

    /**
     * @param DateTime $created_on
     */
    public function setCreatedOn(DateTime $created_on): void
    {
        $this->created_on = $created_on;
    }

    public function isValid(): bool
    {
        if (empty($this->refresh_token)) {
            return false;
        }

        if (empty($this->access_token)) {
            return false;
        }

        if (empty($this->expires_in)) {
            return false;
        }

        return true;
    }

    public function isExpired(): bool
    {
        $expiresOn = (clone $this->created_on)->add(new \DateInterval('PT' . $this->expires_in . 'S'));
        if ($expiresOn <= new DateTime()) {
            return true;
        }

        return false;
    }
}
