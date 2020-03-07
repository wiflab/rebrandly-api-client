<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Workspace implements Model
{
    /**
     * @var string
     */
    private $id = '';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $avatarUrl = '';

    /**
     * @var int
     */
    private $links = 0;

    /**
     * @var int
     */
    private $teamMates = 0;

    /**
     * @var int
     */
    private $domains = 0;

    /**
     * @var bool
     */
    private $owner = true;

    /**
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $type = '';

    /**
     * @var bool
     */
    private $default = false;

    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $role = '';

    /**
     * @var int
     */
    private $clicks = 0;

    /**
     * @var int
     */
    private $sessions = 0;

    /**
     * @var DateTimeInterface|null
     */
    private $lastClickAt;

    /**
     * @param stdClass $response
     * @return Workspace
     */
    public static function fromResponse(stdClass $response): Workspace
    {
        return (new self())
            ->setId($response->id)
            ->setName($response->name)
            ->setAvatarUrl($response->avatarUrl)
            ->setLinks($response->links)
            ->setTeamMates($response->teammates)
            ->setDomains($response->domains)
            ->setOwner($response->owner)
            ->setCreatedAt(Carbon::parse($response->createdAt))
            ->setUpdatedAt(Carbon::parse($response->updatedAt))
            ->setType($response->type)
            ->setDefault($response->default)
            ->setEmail($response->email)
            ->setRole($response->role)
            ->setClicks($response->clicks)
            ->setSessions($response->sessions)
            ->setLastClickAt(Carbon::parse($response->lastClickAt));
    }

    /**
     * Workspace constructor.
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
     * @return Workspace
     */
    public function setId(string $id): Workspace
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Workspace
     */
    public function setName(string $name): Workspace
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     * @return Workspace
     */
    public function setAvatarUrl(string $avatarUrl): Workspace
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @return int
     */
    public function getLinks(): int
    {
        return $this->links;
    }

    /**
     * @param int $links
     * @return Workspace
     */
    public function setLinks(int $links): Workspace
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @return int
     */
    public function getTeamMates(): int
    {
        return $this->teamMates;
    }

    /**
     * @param int $teamMates
     * @return Workspace
     */
    public function setTeamMates(int $teamMates): Workspace
    {
        $this->teamMates = $teamMates;
        return $this;
    }

    /**
     * @return int
     */
    public function getDomains(): int
    {
        return $this->domains;
    }

    /**
     * @param int $domains
     * @return Workspace
     */
    public function setDomains(int $domains): Workspace
    {
        $this->domains = $domains;
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
     * @return Workspace
     */
    public function setCreatedAt(DateTimeInterface $createdAt): Workspace
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
     * @return Workspace
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): Workspace
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner;
    }

    /**
     * @param bool $owner
     * @return Workspace
     */
    public function setOwner(bool $owner): Workspace
    {
        $this->owner = $owner;
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
     * @return Workspace
     */
    public function setType(string $type): Workspace
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return Workspace
     */
    public function setDefault(bool $default): Workspace
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Workspace
     */
    public function setEmail(string $email): Workspace
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Workspace
     */
    public function setRole(string $role): Workspace
    {
        $this->role = $role;
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
     * @return Workspace
     */
    public function setClicks(int $clicks): Workspace
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
     * @return Workspace
     */
    public function setSessions(int $sessions): Workspace
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
     * @return Workspace
     */
    public function setLastClickAt(?DateTimeInterface $lastClickAt): Workspace
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }
}
