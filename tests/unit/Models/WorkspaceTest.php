<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\Workspace;

class WorkspaceTest extends TestCase
{
    public function testFromResponse()
    {
        $data = [
            'id' => 'id',
            'name' => 'Main Workspace',
            'avatarUrl' => 'avatarurl',
            'links' => 1,
            'teammates' => 1,
            'domains' => 2,
            'owner' => true,
            'createdAt' => '2017-11-28T12:14:38.000Z',
            'updatedAt' => '2017-11-28T12:14:38.000Z',
            'type' => 'classic',
            'default' => true,
            'email' => 'email',
            'role' => 'owner',
            'clicks' => 2,
            'sessions' => 2,
            'lastClickAt' => '2020-03-07T13:42:35Z',
        ];

        $response = json_decode(json_encode($data));

        $workspace = Workspace::fromResponse($response);

        $this->assertSame('id', $workspace->getId());
        $this->assertSame('Main Workspace', $workspace->getName());
        $this->assertSame('avatarurl', $workspace->getAvatarUrl());
        $this->assertSame(1, $workspace->getLinks());
        $this->assertSame(1, $workspace->getTeamMates());
        $this->assertSame(2, $workspace->getDomains());
        $this->assertTrue($workspace->isOwner());
        $this->assertInstanceOf(DateTimeInterface::class, $workspace->getCreatedAt());
        $this->assertInstanceOf(DateTimeInterface::class, $workspace->getUpdatedAt());
        $this->assertSame('classic', $workspace->getType());
        $this->assertTrue($workspace->isDefault());
        $this->assertSame('email', $workspace->getEmail());
        $this->assertSame('owner', $workspace->getRole());
        $this->assertSame(2, $workspace->getClicks());
        $this->assertSame(2, $workspace->getSessions());
        $this->assertInstanceOf(DateTimeInterface::class, $workspace->getLastClickAt());
    }
}
