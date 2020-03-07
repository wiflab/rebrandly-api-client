<?php

namespace Vdhicts\Rebrandly;

use Vdhicts\Rebrandly\Contracts\Client;
use Vdhicts\Rebrandly\Endpoints\Account;
use Vdhicts\Rebrandly\Endpoints\Domains;
use Vdhicts\Rebrandly\Endpoints\Links;
use Vdhicts\Rebrandly\Endpoints\Scripts;
use Vdhicts\Rebrandly\Endpoints\Tags;

class Rebrandly
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Rebrandly constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Initializes the account endpoint.
     *
     * @return Account
     */
    public function account(): Account
    {
        return new Account($this->client);
    }

    /**
     * Initializes the domains endpoints.
     *
     * @return Domains
     */
    public function domains(): Domains
    {
        return new Domains($this->client);
    }

    /**
     * Initializes the links endpoints.
     *
     * @return Links
     */
    public function links(): Links
    {
        return new Links($this->client);
    }

    /**
     * Initializes the scripts endpoints.
     *
     * @return Scripts
     */
    public function scripts(): Scripts
    {
        return new Scripts($this->client);
    }

    /**
     * Initializes the tags endpoints.
     *
     * @return Tags
     */
    public function tags(): Tags
    {
        return new Tags($this->client);
    }
}
