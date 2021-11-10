<?php

namespace AllDigitalRewards\Xoxoday\Orders;

class Order extends \AllDigitalRewards\Xoxoday\AbstractEntity
{
    protected $orderId;
    protected $vouchers;
    protected $amountCharged;
    protected $currencyCode;
    protected $tag;
    protected $currencyValue;
    protected $discountPercent;
    protected $orderDiscount;
    protected $orderTotal;
    protected $orderStatus;
    protected $deliveryStatus;

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return mixed
     */
    public function getVouchers()
    {
        return $this->vouchers;
    }

    /**
     * @param mixed $vouchers
     */
    public function setVouchers($vouchers): void
    {
        $this->vouchers = $vouchers;
    }

    /**
     * @return mixed
     */
    public function getAmountCharged()
    {
        return $this->amountCharged;
    }

    /**
     * @param mixed $amountCharged
     */
    public function setAmountCharged($amountCharged): void
    {
        $this->amountCharged = $amountCharged;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getCurrencyValue()
    {
        return $this->currencyValue;
    }

    /**
     * @param mixed $currencyValue
     */
    public function setCurrencyValue($currencyValue): void
    {
        $this->currencyValue = $currencyValue;
    }

    /**
     * @return mixed
     */
    public function getDiscountPercent()
    {
        return $this->discountPercent;
    }

    /**
     * @param mixed $discountPercent
     */
    public function setDiscountPercent($discountPercent): void
    {
        $this->discountPercent = $discountPercent;
    }

    /**
     * @return mixed
     */
    public function getOrderDiscount()
    {
        return $this->orderDiscount;
    }

    /**
     * @param mixed $orderDiscount
     */
    public function setOrderDiscount($orderDiscount): void
    {
        $this->orderDiscount = $orderDiscount;
    }

    /**
     * @return mixed
     */
    public function getOrderTotal()
    {
        return $this->orderTotal;
    }

    /**
     * @param mixed $orderTotal
     */
    public function setOrderTotal($orderTotal): void
    {
        $this->orderTotal = $orderTotal;
    }

    /**
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param mixed $orderStatus
     */
    public function setOrderStatus($orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return mixed
     */
    public function getDeliveryStatus()
    {
        return $this->deliveryStatus;
    }

    /**
     * @param mixed $deliveryStatus
     */
    public function setDeliveryStatus($deliveryStatus): void
    {
        $this->deliveryStatus = $deliveryStatus;
    }
}
