<?php

namespace Vdhicts\Rebrandly\Endpoints;

use stdClass;
use Vdhicts\Rebrandly\Models;
use Vdhicts\Rebrandly\Support\Options;

class Domains extends Endpoint
{
    /**
     * Get the list of domains shared in the current workspace.
     *
     * @param Options|null $options
     * @return array<Models\Domain>
     */
    public function list(Options $options = null): array
    {
        $payload = $this->prepare([], $options, [
            'active',
            'orderBy',
            'orderDir',
            'limit',
            'last',
        ]);

        $response = $this
            ->client
            ->request('GET', 'domains', $payload);

        return array_map(
            function (stdClass $domain) {
                return Models\Domain::fromResponse($domain);
            },
            $response
        );
    }

    /**
     * Get details about a specific domain.
     *
     * @param string $id
     * @return Models\Domain
     */
    public function get(string $id): Models\Domain
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('GET', sprintf('domains/%s', $id), $payload);

        return Models\Domain::fromResponse($response);
    }

    /**
     * Get how many domains with given filtering conditions.
     *
     * @param Options|null $options
     * @return int
     */
    public function count(Options $options = null): int
    {
        $payload = $this->prepare([], $options, [
            'active',
            'type',
        ]);

        $response = $this
            ->client
            ->request('GET', 'domains/count', $payload);

        return $response->count;
    }
}
