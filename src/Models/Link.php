<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Link implements Model
{
    /**
     * Unique identifier associated with the branded short link.
     * @var string
     */
    private $id = '';

    /**
     * A title you assign to the branded short link in order to remember what's behind it.
     * @var string
     */
    private $title = '';

    /**
     * The keyword section of your branded short link.
     * @var string
     */
    private $slashtag = '';

    /**
     * The destination URL you want your branded short link to point to.
     * @var string
     */
    private $destination = '';

    /**
     * The full branded short link URL, including domain.
     * @var string
     */
    private $shortUrl = '';

    /**
     * A reference to the branded domain's resource of a branded short link.
     * @var Domain|null
     */
    private $domain = null;

    /**
     * The UTC date/time this branded short link was created.
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * The last UTC date/time this branded short link was updated.
     * @var DateTimeInterface
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $status = '';

    /**
     * How many clicks there are on this branded short link so far.
     * @var int
     */
    private $clicks = 0;

    /**
     * @var int
     */
    private $sessions = 0;

    /**
     * The UTC date/time this branded short link was last clicked on.
     * @var DateTimeInterface|null
     */
    private $lastClickAt = null;

    /**
     * @var bool
     */
    private $https = true;

    /**
     * Whether a link is favourited (loved) or not.
     * @var bool
     */
    private $favourite = false;

    /**
     * Whether query parameters in short URL will be forwarded to destination URL.
     * @var bool
     */
    private $forwardParameters = true;

    /**
     * @param stdClass $response
     * @return Link
     */
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

    /**
     * Link constructor.
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
     * @return Link
     */
    public function setId(string $id): Link
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Link
     */
    public function setTitle(string $title): Link
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlashtag(): string
    {
        return $this->slashtag;
    }

    /**
     * @param string $slashtag
     * @return Link
     */
    public function setSlashtag(string $slashtag): Link
    {
        $this->slashtag = $slashtag;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return Link
     */
    public function setDestination(string $destination): Link
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    /**
     * @param string $shortUrl
     * @return Link
     */
    public function setShortUrl(string $shortUrl): Link
    {
        $this->shortUrl = $shortUrl;
        return $this;
    }

    /**
     * @return Domain|null
     */
    public function getDomain(): ?Domain
    {
        return $this->domain;
    }

    /**
     * @param Domain|null $domain
     * @return Link
     */
    public function setDomain(?Domain $domain): Link
    {
        $this->domain = $domain;
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
     * @return Link
     */
    public function setCreatedAt(DateTimeInterface $createdAt): Link
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
     * @return Link
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): Link
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Link
     */
    public function setStatus(string $status): Link
    {
        $this->status = $status;
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
     * @return Link
     */
    public function setClicks(int $clicks): Link
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
     * @return Link
     */
    public function setSessions(int $sessions): Link
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
     * @return Link
     */
    public function setLastClickAt(?DateTimeInterface $lastClickAt): Link
    {
        $this->lastClickAt = $lastClickAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHttps(): bool
    {
        return $this->https;
    }

    /**
     * @param bool $https
     * @return Link
     */
    public function setHttps(bool $https): Link
    {
        $this->https = $https;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFavourite(): bool
    {
        return $this->favourite;
    }

    /**
     * @param bool $favourite
     * @return Link
     */
    public function setFavourite(bool $favourite): Link
    {
        $this->favourite = $favourite;
        return $this;
    }

    /**
     * @return bool
     */
    public function isForwardParameters(): bool
    {
        return $this->forwardParameters;
    }

    /**
     * @param bool $forwardParameters
     * @return Link
     */
    public function setForwardParameters(bool $forwardParameters): Link
    {
        $this->forwardParameters = $forwardParameters;
        return $this;
    }
}
