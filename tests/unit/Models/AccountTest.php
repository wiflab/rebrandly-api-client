<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use Carbon\Carbon;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\Account;
use Vdhicts\Rebrandly\Models\AccountSubscription;

class AccountTest extends TestCase
{
    public function testFromResponse()
    {
        $data = [
            'id' => 'id',
            'createdAt' => '2017-11-28T12:14:38.000Z',
            'username' => 'username',
            'email' => 'email',
            'fullName' => 'fullName',
            'avatarUrl' => 'avatarurl',
            'myCname' => 'rebrandlydomain.com.',
            'subscription' => [
                'category' => 'free',
                'createdAt' => '2017-11-28T12:14:38.000Z',
                'due' => 0,
                'limits' => [
                    'links' => [
                        'used' => 0,
                        'included' => 1000,
                        'blocked' => 0,
                    ],
                    'domains' => [
                        'used' => 1,
                        'included' => 5,
                    ],
                    'workspaces' => [
                        'used' => 1,
                        'included' => 1,
                    ],
                    'cycle' => [
                        'used' => 0,
                    ],
                    'tags' => [
                        'used' => 0,
                        'included' => 0,
                    ],
                    'scripts' => [
                        'used' => 0,
                        'included' => 0,
                    ],
                    'apps' => [
                        'used' => 0,
                    ],
                ],
                'features' => [
                    'links' => [
                        'scripts' => false,
                    ],
                    'workspaces' => [
                        'extended' => false,
                    ],
                    'teammates' => false,
                    'domains' => [
                        'whitelabeled' => false,
                        'customSSL' => false,
                    ],
                    'clicks' => [
                        'total' => true,
                        'last' => true,
                    ],
                    'reports' => [
                        'links' => true,
                        'custom' => false,
                        'public' => true,
                    ],
                    'twoFactorAuth' => true,
                    'extra' => [
                        '301_redirect' => true,
                    ],
                ],
            ],
            'clicks' => 1,
            'sessions' => 1,
            'lastClickAt' => '2020-03-07T08:37:02Z',
        ];

        $response = json_decode(json_encode($data));

        $account = Account::fromResponse($response);

        $this->assertSame('id', $account->getId());
        $this->assertSame('username', $account->getUsername());
        $this->assertSame('email', $account->getEmail());
        $this->assertSame('fullName', $account->getFullName());
        $this->assertSame('avatarurl', $account->getAvatarUrl());
        $this->assertSame('rebrandlydomain.com.', $account->getMyCname());
        $this->assertInstanceOf(DateTimeInterface::class, $account->getCreatedAt());
        $this->assertInstanceOf(AccountSubscription::class, $account->getSubscription());
        $this->assertSame(1, $account->getClicks());
        $this->assertSame(1, $account->getSessions());
        $this->assertInstanceOf(DateTimeInterface::class, $account->getLastClickAt());
    }
}
