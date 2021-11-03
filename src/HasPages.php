<?php
/**
 * Designed to set and get common page and limit variables for request objects.
 */

namespace AllDigitalRewards\Xoxoday;

trait HasPages
{
    protected int $page = 1;
    protected int $limit = 10;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * Increase page count by one to fetch next page.
     */
    public function setNextPage(): void
    {
        $this->page++;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }
}
