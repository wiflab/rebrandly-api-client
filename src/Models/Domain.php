<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Domain implements Model
{
    private string $id = '';
    private string $fullName = '';
    private string $topLevelDomain = '';
    private int $level = 0;
    private DateTimeInterface $createdAt;
    private DateTimeInterface $updatedAt;
    private string $type = '';
    private bool $active = true;
    private int $subdomains = 0;
    private bool $managed = true;
    private int $clicks = 0;
    private int $sessions = 0;
    private ?DateTimeInterface $lastClickAt = null;

    public static function fromResponse(stdClass $response): Domain
    {
        $domain = (new self())
            ->setId($response->id)
            ->setFullName($response->fullName)
            ->setTopLevelDomain($response->topLevelDomain)
            ->setLevel($response->level)
            ->setCreatedAt(Carbon::parse($response->createdAt))
            ->setUpdatedAt(Carbon::parse($response->updatedAt))
            ->setType($response->type)
            ->setSubdomains($response->subdomains)
            ->setManaged($response->managed)
            ->setActive($response->active);

        if (isset($response->clicks)) {
            $domain->setClicks($response->clicks);
        }

        if (isset($response->sessions)) {
            $domain->setSessions($response->sessions);
        }

        if (isset($response->lastClickAt)) {
            $domain->setLastClickAt(Carbon::parse($response->lastClickAt));
        }

        return $domain;
    }

    public function __construct()
    {
        $this->createdAt = Carbon::now();
        $this->updatedAt = Carbon::now();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Domain
    {
        $this->id = $id;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): Domain
    {
        $this->fullName = $fullName;
        return $this;
    }

    public function getTopLevelDomain(): string
    {
        return $this->topLevelDomain;
    }

    public function setTopLevelDomain(string $topLevelDomain): Domain
    {
        $this->topLevelDomain = $topLevelDomain;
        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): Domain
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): Domain
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Domain
    {
        $this->type = $type;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): Domain
    {
        $this->active = $active;
        return $this;
    }

    public function getSubdomains(): int
    {
        return $this->subdomains;
    }

    public function setSubdomains(int $subdomains): Domain
    {
        $this->subdomains = $subdomains;
        return $this;
    }

    public function isManaged(): bool
    {
        return $this->managed;
    }

    public function setManaged(bool $managed): Domain
    {
        $this->managed = $managed;
        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): Domain
    {
        $this->level = $level;
        return $this;
    }

    public function getClicks(): int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): Domain
    {
        $this->clicks = $clicks;
        return $this;
    }

    public function getSessions(): int
    {
        return $this->sessions;
    }

    public function setSessions(int $sessions): Domain
    {
        $this->sessions = $sessions;
        return $this;
    }

    public function getLastClickAt(): ?DateTimeInterface
    {
        return $this->lastClickAt;
    }

    public function setLastClickAt(?DateTimeInterface $lastClickAt): Domain
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }
}
