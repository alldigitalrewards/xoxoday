<?php

namespace AllDigitalRewards\Xoxoday;

use AllDigitalRewards\Xoxoday\Auth\AccessTokenResponse;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class AccessTokenResponseTest extends TestCase
{

    public function testIsValid()
    {
        $response = new Response(
            200,
            [],
            file_get_contents(__DIR__ . '/fixtures/accessTokenResponse.json')
        );
        $accessTokenResponse = new AccessTokenResponse($response);
        self::assertTrue($accessTokenResponse->isValid());
    }

    public function testIsExpired()
    {
        $response = new Response(
            200,
            [],
            file_get_contents(__DIR__ . '/fixtures/accessTokenResponse.json')
        );
        $accessTokenResponse = new AccessTokenResponse($response);

        $createdOn = new \DateTime($accessTokenResponse->getExpiresIn() + 60 . ' seconds ago');
        $accessTokenResponse->setCreatedOn($createdOn);

        self::assertTrue($accessTokenResponse->isExpired());
    }

    public function testExercisingIsExpiredDoesNotAddTime()
    {
        $response = new Response(
            200,
            [],
            file_get_contents(__DIR__ . '/fixtures/accessTokenResponse.json')
        );
        $accessTokenResponse = new AccessTokenResponse($response);

        // Regression test to ensure we don't mistakenly modify the created_on time when testing isExpired()
        $createdOn = new \DateTime($accessTokenResponse->getExpiresIn() + 60 . ' seconds ago');
        $accessTokenResponse->setCreatedOn($createdOn);

        $accessTokenResponse->isExpired();
        $accessTokenResponse->isExpired();
        $accessTokenResponse->isExpired();

        self::assertTrue($accessTokenResponse->isExpired());
    }
}
