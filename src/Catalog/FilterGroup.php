<?php


namespace AllDigitalRewards\Xoxoday\Catalog;

use AllDigitalRewards\Xoxoday\AbstractEntity;

class FilterGroup extends AbstractEntity
{
    /**
     * @var string
     */
    protected string $filterGroupName = "";
    /**
     * @var string
     */
    protected string $filterGroupDescription = "";
    /**
     * @var string
     */
    protected string $filterGroupCode = "";
    /**
     * @var Filter[]
     */
    protected array $filters = [];

    /**
     * @return string
     */
    public function getFilterGroupName(): string
    {
        return $this->filterGroupName;
    }

    /**
     * @param string $filterGroupName
     */
    public function setFilterGroupName(string $filterGroupName): void
    {
        $this->filterGroupName = $filterGroupName;
    }

    /**
     * @return string
     */
    public function getFilterGroupDescription(): string
    {
        return $this->filterGroupDescription;
    }

    /**
     * @param string $filterGroupDescription
     */
    public function setFilterGroupDescription(string $filterGroupDescription): void
    {
        $this->filterGroupDescription = $filterGroupDescription;
    }

    /**
     * @return string
     */
    public function getFilterGroupCode(): string
    {
        return $this->filterGroupCode;
    }

    /**
     * @param string $filterGroupCode
     */
    public function setFilterGroupCode(string $filterGroupCode): void
    {
        $this->filterGroupCode = $filterGroupCode;
    }

    /**
     * @return Filter[]
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @param Filter[] $filters
     */
    public function setFilters(array $filters): void
    {
        foreach ($filters as $filter) {
            $this->filters[] = new Filter($filter);
        }
    }
}
