<?php

namespace Vdhicts\Rebrandly\Endpoints;

use Vdhicts\Rebrandly\Contracts\Client;
use Vdhicts\Rebrandly\Support\Options;

abstract class Endpoint
{
    protected Client $client;
    private string $workspace;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setWorkspace(string $workspace): Endpoint
    {
        $this->workspace = $workspace;

        return $this;
    }

    private function queryFromOptions(Options $options = null, array $allowedFields = []): array
    {
        if (is_null($options)) {
            return [];
        }

        $optionsArray = [];

        foreach ($allowedFields as $allowedField) {
            if (! $options->has($allowedField)) {
                continue;
            }

            $optionsArray[$allowedField] = $options->get($allowedField);
        }

        return $optionsArray;
    }

    protected function prepare(array $payload = [], Options $options = null, array $allowedFields = []): array
    {
        if (is_null($this->workspace)) {
            unset($payload['header']['workspace']);
        } else {
            $payload['header']['workspace'] = $this->workspace;
        }

        if (is_null($options)) {
            return $payload;
        }

        $payload['query'] = array_merge($this->queryFromOptions($options, $allowedFields), $payload['query']);

        return $payload;
    }
}
