<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Workspace implements Model
{
    private string $id = '';
    private string $name = '';
    private string $avatarUrl = '';
    private int $links = 0;
    private int $teamMates = 0;
    private int $domains = 0;
    private bool $owner = true;
    private DateTimeInterface $createdAt;
    private DateTimeInterface$updatedAt;
    private string $type = '';
    private bool $default = false;
    private string $email = '';
    private string $role = '';
    private int $clicks = 0;
    private int $sessions = 0;
    private ?DateTimeInterface $lastClickAt;

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

    public function __construct()
    {
        $this->createdAt = Carbon::now();
        $this->updatedAt = Carbon::now();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Workspace
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Workspace
    {
        $this->name = $name;
        return $this;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(string $avatarUrl): Workspace
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    public function getLinks(): int
    {
        return $this->links;
    }

    public function setLinks(int $links): Workspace
    {
        $this->links = $links;
        return $this;
    }

    public function getTeamMates(): int
    {
        return $this->teamMates;
    }

    public function setTeamMates(int $teamMates): Workspace
    {
        $this->teamMates = $teamMates;
        return $this;
    }

    public function getDomains(): int
    {
        return $this->domains;
    }

    public function setDomains(int $domains): Workspace
    {
        $this->domains = $domains;
        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): Workspace
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): Workspace
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function isOwner(): bool
    {
        return $this->owner;
    }

    public function setOwner(bool $owner): Workspace
    {
        $this->owner = $owner;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Workspace
    {
        $this->type = $type;
        return $this;
    }

    public function isDefault(): bool
    {
        return $this->default;
    }

    public function setDefault(bool $default): Workspace
    {
        $this->default = $default;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Workspace
    {
        $this->email = $email;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): Workspace
    {
        $this->role = $role;
        return $this;
    }

    public function getClicks(): int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): Workspace
    {
        $this->clicks = $clicks;
        return $this;
    }

    public function getSessions(): int
    {
        return $this->sessions;
    }

    public function setSessions(int $sessions): Workspace
    {
        $this->sessions = $sessions;
        return $this;
    }

    public function getLastClickAt(): ?DateTimeInterface
    {
        return $this->lastClickAt;
    }

    public function setLastClickAt(?DateTimeInterface $lastClickAt): Workspace
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }
}
