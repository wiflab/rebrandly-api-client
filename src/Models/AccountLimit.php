<?php

namespace Vdhicts\Rebrandly\Models;

use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class AccountLimit implements Model
{
    private int $used = 0;
    private int $included = 0;
    private int $blocked = 0;

    public static function fromResponse(stdClass $response): AccountLimit
    {
        $limit = new self();

        if (isset($response->used)) {
            $limit->setUsed($response->used);
        }

        if (isset($response->included)) {
            $limit->setIncluded($response->included);
        }

        if (isset($response->blocked)) {
            $limit->setBlocked($response->blocked);
        }

        return $limit;
    }

    public function getUsed(): int
    {
        return $this->used;
    }

    public function setUsed(int $used): AccountLimit
    {
        $this->used = $used;
        return $this;
    }

    public function getIncluded(): int
    {
        return $this->included;
    }

    public function setIncluded(int $included): AccountLimit
    {
        $this->included = $included;
        return $this;
    }

    public function getBlocked(): int
    {
        return $this->blocked;
    }

    public function setBlocked(int $blocked): AccountLimit
    {
        $this->blocked = $blocked;
        return $this;
    }
}
