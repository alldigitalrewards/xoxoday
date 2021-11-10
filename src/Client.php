<?php

namespace AllDigitalRewards\Xoxoday;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class Client
{
    private ClientInterface $httpClient;

    public function __construct(ClientInterface $httpClient = null)
    {
        if ($httpClient === null) {
            $httpClient = new \GuzzleHttp\Client();
        }

        $this->httpClient = $httpClient;
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function request(HasResponse $request): AbstractEntity
    {
        $responseObjClass = $request->getResponseObject();

        return new $responseObjClass(
            $this->httpClient->sendRequest($request)
        );
    }
}
