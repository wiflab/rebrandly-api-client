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
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function account(): Account
    {
        return new Account($this->client);
    }

    public function domains(): Domains
    {
        return new Domains($this->client);
    }

    public function links(): Links
    {
        return new Links($this->client);
    }

    public function scripts(): Scripts
    {
        return new Scripts($this->client);
    }

    public function tags(): Tags
    {
        return new Tags($this->client);
    }
}
