<?php
/**
 * Place Order API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/orders/placeorder-api
 */

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\AbstractResponse;
use Exception;

class PlaceOrderResponse extends AbstractResponse
{
    protected $order = null;

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    /**
     * @throws Exception
     */
    public function extractData(\stdClass $data): AbstractResponse
    {
        if (empty($data->data->placeOrder->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new Exception('Place Order failure');
        }

        $order = new Order($data->data->placeOrder->data);
        $this->setOrder($order);

        return $this;
    }
}
