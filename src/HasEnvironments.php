<?php


namespace AllDigitalRewards\Xoxoday;

trait HasEnvironments
{
    private string $stageUrl = 'https://stagingaccount.xoxoday.com/chef';
    private string $prodUrl = 'https://accounts.xoxoday.com/chef';
    private bool $isProduction;

    public function setProduction()
    {
        $this->isProduction = true;
    }

    public function setStaging()
    {
        $this->isProduction = false;
    }

    public function isProduction()
    {
        if (isset($this->isProduction)) {
            // Environment was intentionally set.
            return $this->isProduction;
        }

        if (getenv('ENVIRONMENT') === 'PRODUCTION') {
            // doing some magic to see if it's production.
            return true;
        }

        // Default to staging.
        return false;
    }

    public function getBaseUrl()
    {
        if ($this->isProduction()) {
            return $this->prodUrl;
        }

        return $this->stageUrl;
    }
}
