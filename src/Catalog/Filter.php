<?php


namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractEntity;

class Filter extends AbstractEntity
{
    protected string $filterValue = "";
    protected string $isoCode = "";
    protected string $filterValueCode = "";

    /**
     * @return string
     */
    public function getFilterValue(): string
    {
        return $this->filterValue;
    }

    /**
     * @param string $filterValue
     */
    public function setFilterValue(string $filterValue): void
    {
        $this->filterValue = $filterValue;
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @param string $isoCode
     */
    public function setIsoCode(string $isoCode): void
    {
        $this->isoCode = $isoCode;
    }

    /**
     * @return string
     */
    public function getFilterValueCode(): string
    {
        return $this->filterValueCode;
    }

    /**
     * @param string $filterValueCode
     */
    public function setFilterValueCode(string $filterValueCode): void
    {
        $this->filterValueCode = $filterValueCode;
    }
}
