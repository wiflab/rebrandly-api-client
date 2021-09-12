<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Account implements Model
{
    private string $id = '';
    private string $username = '';
    private string $email = '';
    private string $fullName = '';
    private string $avatarUrl = '';
    private string $myCname = '';
    private DateTimeInterface $createdAt;
    private ?AccountSubscription $subscription = null;
    private int $clicks = 0;
    private int $sessions = 0;
    private ?DateTimeInterface $lastClickAt = null;

    public static function fromResponse(stdClass $response): Account
    {
        return (new self())
            ->setId($response->id)
            ->setCreatedAt(Carbon::parse($response->createdAt))
            ->setUsername($response->username)
            ->setEmail($response->email)
            ->setFullName($response->fullName)
            ->setAvatarUrl($response->avatarUrl)
            ->setMyCname($response->myCname)
            ->setSubscription(AccountSubscription::fromResponse($response->subscription))
            ->setClicks($response->clicks)
            ->setSessions($response->sessions)
            ->setLastClickAt(Carbon::parse($response->lastClickAt));
    }

    public function __construct()
    {
        $this->createdAt = Carbon::now();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Account
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Account
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Account
    {
        $this->email = $email;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): Account
    {
        $this->fullName = $fullName;
        return $this;
    }

    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(string $avatarUrl): Account
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    public function getMyCname(): string
    {
        return $this->myCname;
    }

    public function setMyCname(string $myCname): Account
    {
        $this->myCname = $myCname;
        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): Account
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getSubscription(): ?AccountSubscription
    {
        return $this->subscription;
    }

    public function setSubscription(?AccountSubscription $subscription): Account
    {
        $this->subscription = $subscription;
        return $this;
    }

    public function getClicks(): int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): Account
    {
        $this->clicks = $clicks;
        return $this;
    }

    public function getSessions(): int
    {
        return $this->sessions;
    }

    public function setSessions(int $sessions): Account
    {
        $this->sessions = $sessions;
        return $this;
    }

    public function getLastClickAt(): ?DateTimeInterface
    {
        return $this->lastClickAt;
    }

    public function setLastClickAt(?DateTimeInterface $lastClickAt): Account
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }
}
