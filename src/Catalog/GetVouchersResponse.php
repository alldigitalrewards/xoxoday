<?php
/**
 * GetVouchers API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/catalog/getvouchers-api
 */

namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractResponse;
use Exception;
use stdClass;

class GetVouchersResponse extends AbstractResponse
{
    protected array $products;

    /**
     * @throws Exception
     */
    public function extractData(stdClass $data): AbstractResponse
    {
        if (empty($data->data->getVouchers->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new Exception('No products found');
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
