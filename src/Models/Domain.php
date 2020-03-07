<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Domain implements Model
{
    /**
     * Unique identifier for the branded domain.
     * @var string
     */
    private $id = '';

    /**
     * Full name of the branded domain.
     * @var string
     */
    private $fullName = '';

    /**
     * The top level domain part of the branded domain name.
     * @var string
     */
    private $topLevelDomain = '';

    /**
     * @var int
     */
    private $level = 0;

    /**
     * UTC creation date/time of the branded domain.
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * UTC last update date/time of the branded domain.
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * Branded domain type, 'service' or 'user'.
     * @var string
     */
    private $type = '';

    /**
     * Whether the branded domain can be used or not to create branded short links.
     * @var bool
     */
    private $active = true;

    /**
     * @var int
     */
    private $subdomains = 0;

    /**
     * @var bool
     */
    private $managed = true;

    /**
     * The amount of clicks on links in this account.
     * @var int
     */
    private $clicks = 0;

    /**
     * The amount of session in this account.
     * @var int
     */
    private $sessions = 0;

    /**
     * UTC date/time of the last click.
     * @var DateTimeInterface|null
     */
    private $lastClickAt = null;

    /**
     * @param stdClass $response
     * @return Domain
     */
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

    /**
     * Domain constructor.
     */
    public function __construct()
    {
        $this->createdAt = Carbon::now();
        $this->updatedAt = Carbon::now();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Domain
     */
    public function setId(string $id): Domain
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return Domain
     */
    public function setFullName(string $fullName): Domain
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTopLevelDomain(): string
    {
        return $this->topLevelDomain;
    }

    /**
     * @param string $topLevelDomain
     * @return Domain
     */
    public function setTopLevelDomain(string $topLevelDomain): Domain
    {
        $this->topLevelDomain = $topLevelDomain;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     * @return Domain
     */
    public function setCreatedAt(DateTimeInterface $createdAt): Domain
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface $updatedAt
     * @return Domain
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): Domain
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Domain
     */
    public function setType(string $type): Domain
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Domain
     */
    public function setActive(bool $active): Domain
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getSubdomains(): int
    {
        return $this->subdomains;
    }

    /**
     * @param int $subdomains
     * @return Domain
     */
    public function setSubdomains(int $subdomains): Domain
    {
        $this->subdomains = $subdomains;
        return $this;
    }

    /**
     * @return bool
     */
    public function isManaged(): bool
    {
        return $this->managed;
    }

    /**
     * @param bool $managed
     * @return Domain
     */
    public function setManaged(bool $managed): Domain
    {
        $this->managed = $managed;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return Domain
     */
    public function setLevel(int $level): Domain
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getClicks(): int
    {
        return $this->clicks;
    }

    /**
     * @param int $clicks
     * @return Domain
     */
    public function setClicks(int $clicks): Domain
    {
        $this->clicks = $clicks;
        return $this;
    }

    /**
     * @return int
     */
    public function getSessions(): int
    {
        return $this->sessions;
    }

    /**
     * @param int $sessions
     * @return Domain
     */
    public function setSessions(int $sessions): Domain
    {
        $this->sessions = $sessions;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getLastClickAt(): ?DateTimeInterface
    {
        return $this->lastClickAt;
    }

    /**
     * @param DateTimeInterface|null $lastClickAt
     * @return Domain
     */
    public function setLastClickAt(?DateTimeInterface $lastClickAt): Domain
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }
}
