<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Account implements Model
{
    /**
     * Unique identifier of the account.
     * @var string
     */
    private $id = '';

    /**
     * Username used in login.
     * @var string
     */
    private $username = '';

    /**
     * Contact email of the account.
     * @var string
     */
    private $email = '';

    /**
     * Full name of the account owner.
     * @var string
     */
    private $fullName = '';

    /**
     * URL of the account avatar.
     * @var string
     */
    private $avatarUrl = '';

    /**
     * Cname for the DNS.
     * @var string
     */
    private $myCname = '';

    /**
     * UTC creation date/time of the account.
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * Set of feature/limits info related to the account and its plan.
     * @var AccountSubscription|null
     */
    private $subscription = null;

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
     * @return Account
     */
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

    /**
     * Account constructor.
     */
    public function __construct()
    {
        $this->createdAt = Carbon::now();
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
     * @return Account
     */
    public function setId(string $id): Account
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Account
     */
    public function setUsername(string $username): Account
    {
        $this->username = $username;
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
     * @return Account
     */
    public function setEmail(string $email): Account
    {
        $this->email = $email;
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
     * @return Account
     */
    public function setFullName(string $fullName): Account
    {
        $this->fullName = $fullName;
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
     * @return Account
     */
    public function setAvatarUrl(string $avatarUrl): Account
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getMyCname(): string
    {
        return $this->myCname;
    }

    /**
     * @param string $myCname
     * @return Account
     */
    public function setMyCname(string $myCname): Account
    {
        $this->myCname = $myCname;
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
     * @return Account
     */
    public function setCreatedAt(DateTimeInterface $createdAt): Account
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return AccountSubscription|null
     */
    public function getSubscription(): ?AccountSubscription
    {
        return $this->subscription;
    }

    /**
     * @param AccountSubscription|null $subscription
     * @return Account
     */
    public function setSubscription(?AccountSubscription $subscription): Account
    {
        $this->subscription = $subscription;
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
     * @return Account
     */
    public function setClicks(int $clicks): Account
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
     * @return Account
     */
    public function setSessions(int $sessions): Account
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
     * @return Account
     */
    public function setLastClickAt(?DateTimeInterface $lastClickAt): Account
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }
}
