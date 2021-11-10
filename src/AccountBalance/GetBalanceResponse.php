<?php
/**
 * GetBalance API
 * https://xoxoday.gitbook.io/plum/developer-resources/overview-of-reward_api/api-endpoints-1/account-balance/getbalance-api
 */

namespace AllDigitalRewards\Xoxoday\AccountBalance;

use AllDigitalRewards\Xoxoday\AbstractResponse;
use Exception;
use stdClass;

class GetBalanceResponse extends AbstractResponse
{
    protected int $points = 0;

    protected int $value = 0;

    protected string $currency = "USD";

    /**
     * @throws Exception
     */
    public function extractData(stdClass $data): AbstractResponse
    {
        if (empty($data->data->getBalance->data)) {
            // ╭∩╮(Ο_Ο)╭∩╮
            throw new Exception('Balance not found');
        }

        return $this->hydrate($data->data->getBalance->data);
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    public function setPoints(int $points): void
    {
        $this->points = $points;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }
}
