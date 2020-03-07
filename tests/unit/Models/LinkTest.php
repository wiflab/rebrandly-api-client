<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\Domain;
use Vdhicts\Rebrandly\Models\Link;

class LinkTest extends TestCase
{
    public function testFromResponse()
    {
        $data = [
            'id' => 'id',
            'title' => 'repo 1',
            'slashtag' => 'repo',
            'destination' => 'destination',
            'createdAt' => '2020-03-07T13:42:20.000Z',
            'updatedAt' => '2020-03-07T13:42:29.000Z',
            'status' => 'active',
            'clicks' => 3,
            'isPublic' => false,
            'shortUrl' => 'rebrand.ly/repo',
            'domainId' => 'domainId',
            'domainName' => 'rebrand.ly',
            'domain' => [
                'id' => 'domainId',
                'ref' => '/domains/domainId',
                'fullName' => 'rebrand.ly',
                'active' => true,
            ],
            'https' => true,
            'favourite' => false,
            'creator' => [
                'id' => 'id',
                'fullName' => 'name',
                'avatarUrl' => 'avatarurl',
            ],
            'integrated' => false,
            'sessions' => 3,
            'lastClickAt' => '2020-03-07T13:42:35Z',
            'forwardParameters' => false,
        ];

        $response = json_decode(json_encode($data));

        $link = Link::fromResponse($response);

        $this->assertSame('id', $link->getId());
        $this->assertSame('repo 1', $link->getTitle());
        $this->assertSame('repo', $link->getSlashtag());
        $this->assertSame('destination', $link->getDestination());
        $this->assertSame('rebrand.ly/repo', $link->getShortUrl());
        $this->assertInstanceOf(Domain::class, $link->getDomain());
        $this->assertInstanceOf(DateTimeInterface::class, $link->getCreatedAt());
        $this->assertInstanceOf(DateTimeInterface::class, $link->getUpdatedAt());
        $this->assertSame('active', $link->getStatus());
        $this->assertSame(3, $link->getClicks());
        $this->assertSame(3, $link->getSessions());
        $this->assertInstanceOf(DateTimeInterface::class, $link->getLastClickAt());
        $this->assertTrue($link->isHttps());
        $this->assertFalse($link->isFavourite());
        $this->assertFalse($link->isForwardParameters());
    }
}
