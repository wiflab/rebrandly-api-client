<?php

namespace Vdhicts\Rebrandly\Models;

use Carbon\Carbon;
use DateTimeInterface;
use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class AccountSubscription implements Model
{
    private DateTimeInterface $createdAt;
    private string $category = '';
    private int $due = 0;
    private array $limits = [];
    private array $features = [];

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

    public function __construct()
    {
        $this->createdAt = Carbon::now();
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): AccountSubscription
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): AccountSubscription
    {
        $this->category = $category;
        return $this;
    }

    public function getDue(): int
    {
        return $this->due;
    }

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
