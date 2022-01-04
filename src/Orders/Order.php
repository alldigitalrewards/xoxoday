<?php

namespace AllDigitalRewards\Xoxoday\Orders;

use AllDigitalRewards\Xoxoday\AbstractEntity;

class Order extends AbstractEntity
{
    protected int $orderId;
    protected array $vouchers;
    protected string|int $amountCharged;
    protected string $currencyCode;
    protected string $tag;
    protected string|float $currencyValue;
    protected string|float $discountPercent;
    protected string|float $orderDiscount;
    protected string|float $orderTotal;
    protected string $orderStatus;
    protected string $deliveryStatus;

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return array
     */
    public function getVouchers(): array
    {
        $container = [];
        foreach ($this->vouchers as $voucher) {
            $container[] =  new Voucher((array)$voucher);
        }
        return $container;
    }

    /**
     * @param array $vouchers
     */
    public function setVouchers(array $vouchers): void
    {
        $this->vouchers = $vouchers;
    }

    /**
     * @return int|string
     */
    public function getAmountCharged(): int|string
    {
        return $this->amountCharged;
    }

    /**
     * @param int|string $amountCharged
     */
    public function setAmountCharged(int|string $amountCharged): void
    {
        $this->amountCharged = $amountCharged;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return float|string
     */
    public function getCurrencyValue(): float|string
    {
        return $this->currencyValue;
    }

    /**
     * @param float|string $currencyValue
     */
    public function setCurrencyValue(float|string $currencyValue): void
    {
        $this->currencyValue = $currencyValue;
    }

    /**
     * @return float|string
     */
    public function getDiscountPercent(): float|string
    {
        return $this->discountPercent;
    }

    /**
     * @param float|string $discountPercent
     */
    public function setDiscountPercent(float|string $discountPercent): void
    {
        $this->discountPercent = $discountPercent;
    }

    /**
     * @return float|string
     */
    public function getOrderDiscount(): float|string
    {
        return $this->orderDiscount;
    }

    /**
     * @param float|string $orderDiscount
     */
    public function setOrderDiscount(float|string $orderDiscount): void
    {
        $this->orderDiscount = $orderDiscount;
    }

    /**
     * @return float|string
     */
    public function getOrderTotal(): float|string
    {
        return $this->orderTotal;
    }

    /**
     * @param float|string $orderTotal
     */
    public function setOrderTotal(float|string $orderTotal): void
    {
        $this->orderTotal = $orderTotal;
    }

    /**
     * @return string
     */
    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    /**
     * @param string $orderStatus
     */
    public function setOrderStatus(string $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return string
     */
    public function getDeliveryStatus(): string
    {
        return $this->deliveryStatus;
    }

    /**
     * @param string $deliveryStatus
     */
    public function setDeliveryStatus(string $deliveryStatus): void
    {
        $this->deliveryStatus = $deliveryStatus;
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['vouchers'] = $this->getVouchers();
        return $data;
    }
}
