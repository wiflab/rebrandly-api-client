<?php

namespace Vdhicts\Rebrandly\Endpoints;

use stdClass;
use Vdhicts\Rebrandly\Models;
use Vdhicts\Rebrandly\Support\Options;

class Account extends Endpoint
{
    /**
     * Get account details.
     *
     * @return Models\Account
     */
    public function get(): Models\Account
    {
        $response = $this
            ->client
            ->request('GET', 'account');

        return Models\Account::fromResponse($response);
    }

    /**
     * Get all workspaces you are part of.
     *
     * @param Options|null $options
     * @return array<Models\Workspace>
     */
    public function workspaces(Options $options = null): array
    {
        $payload = $this->prepare([], $options, [
            'orderBy',
            'orderDir',
            'limit',
            'last',
        ]);

        $response = $this
            ->client
            ->request('GET', 'account/workspaces', $payload);

        return array_map(
            function (stdClass $workspace) {
                return Models\Workspace::fromResponse($workspace);
            },
            $response
        );
    }
}
