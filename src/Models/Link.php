<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Link implements Model
{
    private string $id = '';
    private string $title = '';
    private string $slashtag = '';
    private string $destination = '';
    private string $shortUrl = '';
    private ?Domain $domain = null;
    private DateTimeInterface $createdAt;
    private DateTimeInterface $updatedAt;
    private string $status = '';
    private int $clicks = 0;
    private int $sessions = 0;
    private ?DateTimeInterface $lastClickAt = null;
    private bool $https = true;
    private bool $favourite = false;
    private bool $forwardParameters = true;

    public static function fromResponse(stdClass $response): Link
    {
        $domain = (new Domain())
            ->setId($response->domain->id)
            ->setFullName($response->domain->fullName)
            ->setActive($response->domain->active);

        $link = (new self())
            ->setId($response->id)
            ->setTitle($response->title)
            ->setSlashtag($response->slashtag)
            ->setDomain($domain)
            ->setDestination($response->destination)
            ->setCreatedAt(Carbon::parse($response->createdAt))
            ->setUpdatedAt(Carbon::parse($response->updatedAt))
            ->setStatus($response->status)
            ->setClicks($response->clicks)
            ->setShortUrl($response->shortUrl)
            ->setHttps($response->https)
            ->setFavourite($response->favourite);

        if (isset($response->lastClickAt)) {
            $link->setLastClickAt(Carbon::parse($response->lastClickAt));
        }

        if (isset($response->sessions)) {
            $link->setSessions($response->sessions);
        }

        if (isset($response->forwardParameters)) {
            $link->setForwardParameters($response->forwardParameters);
        }

        return $link;
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

    public function setId(string $id): Link
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Link
    {
        $this->title = $title;
        return $this;
    }

    public function getSlashtag(): string
    {
        return $this->slashtag;
    }

    public function setSlashtag(string $slashtag): Link
    {
        $this->slashtag = $slashtag;
        return $this;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): Link
    {
        $this->destination = $destination;
        return $this;
    }

    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    public function setShortUrl(string $shortUrl): Link
    {
        $this->shortUrl = $shortUrl;
        return $this;
    }

    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    public function setDomain(?Domain $domain): Link
    {
        $this->domain = $domain;
        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): Link
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): Link
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Link
    {
        $this->status = $status;
        return $this;
    }

    public function getClicks(): int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): Link
    {
        $this->clicks = $clicks;
        return $this;
    }

    public function getSessions(): int
    {
        return $this->sessions;
    }

    public function setSessions(int $sessions): Link
    {
        $this->sessions = $sessions;
        return $this;
    }

    public function getLastClickAt(): ?DateTimeInterface
    {
        return $this->lastClickAt;
    }

    public function setLastClickAt(?DateTimeInterface $lastClickAt): Link
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }

    public function isHttps(): bool
    {
        return $this->https;
    }

    public function setHttps(bool $https): Link
    {
        $this->https = $https;
        return $this;
    }

    public function isFavourite(): bool
    {
        return $this->favourite;
    }

    public function setFavourite(bool $favourite): Link
    {
        $this->favourite = $favourite;
        return $this;
    }

    public function isForwardParameters(): bool
    {
        return $this->forwardParameters;
    }

    public function setForwardParameters(bool $forwardParameters): Link
    {
        $this->forwardParameters = $forwardParameters;
        return $this;
    }
}
