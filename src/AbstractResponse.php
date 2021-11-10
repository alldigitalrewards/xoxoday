<?php

namespace AllDigitalRewards\Xoxoday;

use Exception;
use Psr\Http\Message\ResponseInterface;
use stdClass;

abstract class AbstractResponse extends AbstractEntity
{
    /**
     * @throws Exception
     */
    public function __construct(ResponseInterface $response)
    {
        $data = json_decode($response->getBody());
        $this->evaluateErrorsIfExists($data);
        return $this->extractData($data);
    }

    /**
     * @throws Exception
     */
    public function evaluateErrorsIfExists($data)
    {
        //evaluate
        //throw exception
        if (isset($data->error) === true) {
            throw new Exception($data->error_description ?? $data->error);
        }
    }

    abstract public function extractData(stdClass $data): AbstractResponse;
}
