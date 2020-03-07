<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\AccountLimit;

class AccountLimitTest extends TestCase
{
    public function testFromResponse()
    {
        $blocked = 2;
        $used = 4;
        $included = 6;

        $object = (object)[
            'blocked' => $blocked,
            'used' => $used,
            'included' => $included,
        ];

        $accountLimit = AccountLimit::fromResponse($object);

        $this->assertSame($blocked, $accountLimit->getBlocked());
        $this->assertSame($used, $accountLimit->getUsed());
        $this->assertSame($included, $accountLimit->getIncluded());
    }
}
