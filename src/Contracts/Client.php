<?php

namespace Vdhicts\Rebrandly\Contracts;

interface Client
{
    public function request(string $method, string $endpoint, array $payload = []);
}
