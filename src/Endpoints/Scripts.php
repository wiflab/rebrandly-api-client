<?php

namespace Vdhicts\Rebrandly\Endpoints;

use stdClass;
use Vdhicts\Rebrandly\Models;
use Vdhicts\Rebrandly\Support\Options;

class Scripts extends Endpoint
{
    /**
     * Get a list of scripts.
     *
     * @param Options|null $options
     * @return array
     */
    public function list(Options $options = null): array
    {
        $payload = $this->prepare([], $options, [
            'orderBy',
            'orderDir',
            'limit',
            'last',
        ]);

        $response = $this
            ->client
            ->request('GET', 'scripts', $payload);

        return array_map(
            function (stdClass $domain) {
                return Models\Script::fromResponse($domain);
            },
            $response
        );
    }

    /**
     * Get details about a specific script.
     *
     * @param string $id
     * @return Models\Script
     */
    public function get(string $id): Models\Script
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('GET', sprintf('scripts/%s', $id), $payload);

        return Models\Script::fromResponse($response);
    }

    /**
     * Get how many scripts with given filtering conditions.
     *
     * @return int
     */
    public function count(): int
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('GET', 'scripts/count', $payload);

        return $response->count;
    }

    /**
     * Create a new script.
     *
     * @param Models\Script $script
     * @return Models\Script
     */
    public function create(Models\Script $script): Models\Script
    {
        $payload = $this->prepare();

        $payload['form_params'] = [
            'name' => $script->getName(),
            'value' => $script->getValue(),
        ];

        $response = $this
            ->client
            ->request('POST', 'scripts', $payload);

        return Models\Script::fromResponse($response);
    }

    /**
     * Update a script.
     *
     * @param Models\Script $script
     * @return Models\Script
     */
    public function update(Models\Script $script): Models\Script
    {
        $payload = $this->prepare();

        $payload['form_params'] = [
            'name' => $script->getName(),
            'value' => $script->getValue(),
        ];

        $response = $this
            ->client
            ->request('POST', sprintf('scripts/%s', $script->getId()), $payload);

        return Models\Script::fromResponse($response);
    }

    /**
     * Delete a specific script.
     *
     * @param string $id
     * @return Models\Script
     */
    public function delete(string $id): Models\Script
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('DELETE', sprintf('scripts/%s', $id), $payload);

        return Models\Script::fromResponse($response);
    }
}
