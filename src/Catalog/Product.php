<?php


namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractEntity;

class Product extends AbstractEntity
{
    protected int $productId;
    protected string $name;
    protected string $description;
    protected string $termsAndConditions;
    protected string $expiryAndValidity;
    protected string $redemptionInstructions;
    protected string $categories;
    protected string $lastUpdatedDate;
    protected string $imageUrl;
    protected string $currencyCode;
    protected string $currencyName;
    protected string $countryCode;
    protected array $countries;
    protected float $exchangeRateRule;
    protected string $valueType;
    protected int $maxValue;
    protected int $minValue;
    protected string $valueDenominations;
    protected int $tatInDays;
    protected string $usageType;
    protected string $deliveryType;
    protected float $fee;
    protected float $discount;
    protected int $exchangeRate;

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTermsAndConditions(): string
    {
        return $this->termsAndConditions;
    }

    /**
     * @param string $termsAndConditions
     */
    public function setTermsAndConditions(string $termsAndConditions): void
    {
        $this->termsAndConditions = $termsAndConditions;
    }

    /**
     * @return string
     */
    public function getExpiryAndValidity(): string
    {
        return $this->expiryAndValidity;
    }

    /**
     * @param string $expiryAndValidity
     */
    public function setExpiryAndValidity(string $expiryAndValidity): void
    {
        $this->expiryAndValidity = $expiryAndValidity;
    }

    /**
     * @return string
     */
    public function getRedemptionInstructions(): string
    {
        return $this->redemptionInstructions;
    }

    /**
     * @param string $redemptionInstructions
     */
    public function setRedemptionInstructions(string $redemptionInstructions): void
    {
        $this->redemptionInstructions = $redemptionInstructions;
    }

    /**
     * @return string
     */
    public function getCategories(): string
    {
        return $this->categories;
    }

    /**
     * @param string $categories
     */
    public function setCategories(string $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return string
     */
    public function getLastUpdatedDate(): string
    {
        return $this->lastUpdatedDate;
    }

    /**
     * @param string $lastUpdatedDate
     */
    public function setLastUpdatedDate(string $lastUpdatedDate): void
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
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
    public function getCurrencyName(): string
    {
        return $this->currencyName;
    }

    /**
     * @param string $currencyName
     */
    public function setCurrencyName(string $currencyName): void
    {
        $this->currencyName = $currencyName;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    /**
     * @param array $countries
     */
    public function setCountries(array $countries): void
    {
        $this->countries = $countries;
    }

    /**
     * @return float
     */
    public function getExchangeRateRule(): float
    {
        return $this->exchangeRateRule;
    }

    /**
     * @param float $exchangeRateRule
     */
    public function setExchangeRateRule(float $exchangeRateRule): void
    {
        $this->exchangeRateRule = $exchangeRateRule;
    }

    /**
     * @return string
     */
    public function getValueType(): string
    {
        return $this->valueType;
    }

    /**
     * @param string $valueType
     */
    public function setValueType(string $valueType): void
    {
        $this->valueType = $valueType;
    }

    /**
     * @return int
     */
    public function getMaxValue(): int
    {
        return $this->maxValue;
    }

    /**
     * @param int $maxValue
     */
    public function setMaxValue(int $maxValue): void
    {
        $this->maxValue = $maxValue;
    }

    /**
     * @return int
     */
    public function getMinValue(): int
    {
        return $this->minValue;
    }

    /**
     * @param int $minValue
     */
    public function setMinValue(int $minValue): void
    {
        $this->minValue = $minValue;
    }

    /**
     * @return string
     */
    public function getValueDenominations(): string
    {
        return $this->valueDenominations;
    }

    /**
     * @param string $valueDenominations
     */
    public function setValueDenominations(string $valueDenominations): void
    {
        $this->valueDenominations = $valueDenominations;
    }

    /**
     * @return int
     */
    public function getTatInDays(): int
    {
        return $this->tatInDays;
    }

    /**
     * @param int $tatInDays
     */
    public function setTatInDays(int $tatInDays): void
    {
        $this->tatInDays = $tatInDays;
    }

    /**
     * @return string
     */
    public function getUsageType(): string
    {
        return $this->usageType;
    }

    /**
     * @param string $usageType
     */
    public function setUsageType(string $usageType): void
    {
        $this->usageType = $usageType;
    }

    /**
     * @return string
     */
    public function getDeliveryType(): string
    {
        return $this->deliveryType;
    }

    /**
     * @param string $deliveryType
     */
    public function setDeliveryType(string $deliveryType): void
    {
        $this->deliveryType = $deliveryType;
    }

    /**
     * @return float
     */
    public function getFee(): float
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     */
    public function setFee(float $fee): void
    {
        $this->fee = $fee;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return int
     */
    public function getExchangeRate(): int
    {
        return $this->exchangeRate;
    }

    /**
     * @param int $exchangeRate
     */
    public function setExchangeRate(int $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }
}
