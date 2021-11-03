<?php


namespace AllDigitalRewards\Xoxoday;

use Psr\Http\Message\ResponseInterface;

interface HasResponse
{
    public function getResponseObject(): string;
}
