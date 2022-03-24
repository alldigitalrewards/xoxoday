<?php

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\AbstractResponse;
use Exception;
use stdClass;

class GetOrderDetailsResponse extends AbstractResponse
{
    protected Order $order;

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
        if (empty($data->data->getOrderDetails->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new Exception('Get Order Details failure');
        }

        $order = new Order($data->data->getOrderDetails->data);
        $this->setOrder($order);

        return $this;
    }
}