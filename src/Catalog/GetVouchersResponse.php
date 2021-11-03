<?php
/**
 * GetVouchers API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getvouchers-api
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractEntity;
use Psr\Http\Message\ResponseInterface;

class GetVouchersResponse extends AbstractEntity
{
    protected array $products;

    public function __construct(ResponseInterface $response)
    {
        return $this->extractData($response);
    }

    private function extractData(ResponseInterface $response)
    {
        $data = json_decode($response->getBody());

        if (empty($data->data->getVouchers->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new \Exception('Response data hates you.');
        }

        $this->setProducts($data->data->getVouchers->data);

        return $this;
    }

    /**
     * @param array $productData
     */
    private function setProducts(array $productData)
    {
        foreach ($productData as $productDatum) {
            $this->products[] = new Product($productDatum);
        }
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}
