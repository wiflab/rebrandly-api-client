<?php

namespace Vdhicts\Rebrandly\Models;

use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class AccountLimit implements Model
{
    /**
     * How many resources of the given type used.
     * @var int
     */
    private $used = 0;

    /**
     * How many resources of the given type the account is allowing.
     * @var int
     */
    private $included = 0;

    /**
     * How many resource of the given type is blocked.
     * @var int
     */
    private $blocked = 0;

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

    /**
     * @return int
     */
    public function getUsed(): int
    {
        return $this->used;
    }

    /**
     * @param int $used
     * @return AccountLimit
     */
    public function setUsed(int $used): AccountLimit
    {
        $this->used = $used;
        return $this;
    }

    /**
     * @return int
     */
    public function getIncluded(): int
    {
        return $this->included;
    }

    /**
     * @param int $included
     * @return AccountLimit
     */
    public function setIncluded(int $included): AccountLimit
    {
        $this->included = $included;
        return $this;
    }

    /**
     * @return int
     */
    public function getBlocked(): int
    {
        return $this->blocked;
    }

    /**
     * @param int $blocked
     * @return AccountLimit
     */
    public function setBlocked(int $blocked): AccountLimit
    {
        $this->blocked = $blocked;
        return $this;
    }
}
