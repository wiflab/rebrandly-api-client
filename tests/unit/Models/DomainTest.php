<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\Domain;

class DomainTest extends TestCase
{
    public function testFromResponse()
    {
        $data = [
            'id' => 'id',
            'fullName' => 'rebrand.ly',
            'topLevelDomain' => 'ly',
            'routing' => [
                'addressing' => 'unicast',
            ],
            'level' => 2,
            'creationDate' => '2015-01-01T00:00:00.000Z',
            'createdAt' => '2015-01-01T00:00:00.000Z',
            'updatedAt' => '2017-04-24T10:29:37.000Z',
            'customHomepage' => 'https://www.rebrandly.com',
            'type' => 'SERVICE',
            'subdomains' => 0,
            'managed' => true,
            'status' => [
                'dns' => 'verified',
                'encryption' => 'active',
            ],
            'active' => true,
            'clicks' => 1,
            'sessions' => 1,
            'lastClickAt' => '2020-03-07T08:37:02Z',
        ];

        $response = json_decode(json_encode($data));

        $domain = Domain::fromResponse($response);

        $this->assertSame('id', $domain->getId());
        $this->assertSame('rebrand.ly', $domain->getFullName());
        $this->assertSame('ly', $domain->getTopLevelDomain());
        $this->assertSame(2, $domain->getLevel());
        $this->assertInstanceOf(DateTimeInterface::class, $domain->getCreatedAt());
        $this->assertInstanceOf(DateTimeInterface::class, $domain->getUpdatedAt());
        $this->assertSame('SERVICE', $domain->getType());
        $this->assertTrue($domain->isActive());
        $this->assertSame(0, $domain->getSubdomains());
        $this->assertTrue($domain->isManaged());
        $this->assertSame(1, $domain->getClicks());
        $this->assertSame(1, $domain->getSessions());
        $this->assertInstanceOf(DateTimeInterface::class, $domain->getLastClickAt());
    }
}
