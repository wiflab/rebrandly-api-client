<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\AccountLimit;
use Vdhicts\Rebrandly\Models\AccountSubscription;

class AccountSubscriptionTest extends TestCase
{
    public function testFromResponse()
    {
        $category = 'test';
        $due = 5;
        $accountLimit = (new AccountLimit())
            ->setBlocked(0)
            ->setIncluded(10)
            ->setUsed(2);
        $createdAt = Carbon::today();

        $object = json_decode(json_encode([
            'category' => $category,
            'due' => $due,
            'limits' => ['test' => ['blocked' => 0, 'included' => 10, 'used' => 2]],
            'features' => ['a' => 20],
            'createdAt' => $createdAt,
        ]));

        $accountSubscription = AccountSubscription::fromResponse($object);

        $this->assertSame($category, $accountSubscription->getCategory());
        $this->assertSame($due, $accountSubscription->getDue());
        $this->assertSame($createdAt->getTimestamp(), $accountSubscription->getCreatedAt()->getTimestamp());
        $this->assertSame($accountLimit->getUsed(), $accountSubscription->getLimits('test')->getUsed());
        $this->assertSame($object->features->a, $accountSubscription->getFeatures('a'));
        $this->assertIsArray($accountSubscription->getLimits());
        $this->assertIsArray($accountSubscription->getFeatures());
    }
}
