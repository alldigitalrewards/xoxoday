<?php
/**
 * Place Order API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/orders/placeorder-api
 */

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\AbstractEntity;
use AllDigitalRewards\Xoxoday\Catalog\Product;
use Psr\Http\Message\ResponseInterface;

class PlaceOrderResponse extends AbstractEntity
{
    protected array $products;

    public function __construct(ResponseInterface $response)
    {
        return $this->extractData($response);
    }

    private function extractData(ResponseInterface $response)
    {
        $data = json_decode($response->getBody());
        var_dump($data);
        if (empty($data->data->placeOrder->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new \Exception('Response data hates you.');
        }


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
