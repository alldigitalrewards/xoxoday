<?php
/**
 * GetFilters API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getfilters-api
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\HasEnvironments;
use AllDigitalRewards\Xoxoday\HasResponse;
use GuzzleHttp\Psr7\Request;

class GetFiltersRequest extends Request implements HasResponse
{
    use HasEnvironments;

    private string $accessToken = '';

    /**
     * GetFiltersRequest constructor.
     *
     * This should be extended to also accept filterGroupCode, includeFilters & excludeFilters arguments.
     *
     * @param string $access_token
     */
    public function __construct(string $access_token)
    {
        $this->accessToken = $access_token;
        $this->setupRequest();
    }

    public function getResponseObject(): string
    {
        return GetFiltersResponse::class;
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
            '{
	"query": "plumProAPI.mutation.getFilters",
	"tag": "plumProAPI",
	"variables": {
		"data":{
			"filterGroupCode": "",
        	       "includeFilters": "",
        	       "excludeFilters": ""
		}
	}
}'
        );
    }
}
