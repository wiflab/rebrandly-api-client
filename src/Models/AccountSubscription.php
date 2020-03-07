<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class AccountSubscription implements Model
{
    /**
     * UTC subscription date/time of the account's current plan.
     * @var DateTimeInterface
     */
    private $createdAt;

    /**
     * The plan the user is on.
     * @var string
     */
    private $category = '';

    /**
     * The amount of dates the payment is due.
     * @var int
     */
    private $due = 0;

    /**
     * Account's resources usage and limits: how many links/domains/tags/etc created so far and which are the maximum
     * limits.
     * @var array
     */
    private $limits = [];

    /**
     * Account's features.
     * @var array
     */
    private $features = [];

    /**
     * @param stdClass $response
     * @return AccountSubscription
     */
    public static function fromResponse(stdClass $response): AccountSubscription
    {
        $subscription = (new self())
            ->setCategory($response->category)
            ->setCreatedAt(Carbon::parse($response->createdAt))
            ->setDue($response->due);

        foreach ($response->limits as $key => $values) {
            $subscription->setLimits($key, AccountLimit::fromResponse($values));
        }

        foreach ($response->features as $key => $values) {
            $subscription->setFeatures($key, $values);
        }

        return $subscription;
    }

    /**
     * AccountSubscription constructor.
     */
    public function __construct()
    {
        $this->createdAt = Carbon::now();
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
     * @return AccountSubscription
     */
    public function setCreatedAt(DateTimeInterface $createdAt): AccountSubscription
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return AccountSubscription
     */
    public function setCategory(string $category): AccountSubscription
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int
     */
    public function getDue(): int
    {
        return $this->due;
    }

    /**
     * @param int $due
     * @return AccountSubscription
     */
    public function setDue(int $due): AccountSubscription
    {
        $this->due = $due;
        return $this;
    }

    /**
     * @param string|null $key
     * @return array|AccountLimit
     */
    public function getLimits(string $key = null)
    {
        if (! is_null($key) && array_key_exists($key, $this->limits)) {
            return $this->limits[$key];
        }

        return $this->limits;
    }

    /**
     * @param string $key
     * @param AccountLimit $limit
     * @return AccountSubscription
     */
    public function setLimits(string $key, AccountLimit $limit): AccountSubscription
    {
        $this->limits[$key] = $limit;
        return $this;
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function getFeatures(string $key = null)
    {
        if (! is_null($key) && array_key_exists($key, $this->features)) {
            return $this->features[$key];
        }

        return $this->features;
    }

    /**
     * @param string $key
     * @param mixed $features
     * @return AccountSubscription
     */
    public function setFeatures(string $key, $features): AccountSubscription
    {
        $this->features[$key] = $features;
        return $this;
    }
}
