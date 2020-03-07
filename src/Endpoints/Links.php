<?php

namespace Vdhicts\Rebrandly\Endpoints;

use stdClass;
use Vdhicts\Rebrandly\Models;
use Vdhicts\Rebrandly\Support\Options;

class Links extends Endpoint
{
    /**
     * Get a list of links.
     *
     * @param Options|null $options
     * @return array<Models\Link>
     */
    public function list(Options $options = null): array
    {
        $payload = $this->prepare([], $options, [
            'domain.id',
            'domain.fullName',
            'slashtag',
            'creator.id',
            'orderBy',
            'orderDir',
            'limit',
            'last',
        ]);

        $response = $this
            ->client
            ->request('GET', 'links', $payload);

        return array_map(
            function (stdClass $link) {
                return Models\Link::fromResponse($link);
            },
            $response
        );
    }

    /**
     * Get details about a specific link.
     *
     * @param string $id
     * @return Models\Link
     */
    public function get(string $id): Models\Link
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('GET', sprintf('links/%s', $id), $payload);

        return Models\Link::fromResponse($response);
    }

    /**
     * Get how many links with given filtering conditions.
     *
     * @param Options|null $options
     * @return int
     */
    public function count(Options $options = null): int
    {
        $payload = $this->prepare([], $options, [
            'favourite',
            'domain.id',
        ]);

        $response = $this
            ->client
            ->request('GET', 'links/count', $payload);

        return $response->count;
    }

    /**
     * Create a new link.
     *
     * @param Models\Link $link
     * @return Models\Link
     */
    public function create(Models\Link $link): Models\Link
    {
        $payload = $this->prepare();

        $payload['query'] = [
            'destination' => $link->getDestination(),
        ];

        if (! empty($link->getSlashtag())) {
            $payload['query']['slashtag'] = $link->getSlashtag();
        }
        if (! empty($link->getTitle())) {
            $payload['query']['title'] = $link->getTitle();
        }
        if (! empty($link->getDomain())) {
            $domain = $link->getDomain();
            if (! empty($domain->getId())) {
                $payload['query']['domain']['id'] = $domain->getId();
            } else {
                $payload['query']['domain']['fullName'] = $domain->getFullName();
            }
        }

        $response = $this
            ->client
            ->request('GET', 'links/new', $payload);

        return Models\Link::fromResponse($response);
    }

    /**
     * Update a specific link.
     *
     * @param Models\Link $link
     * @return Models\Link
     */
    public function update(Models\Link $link): Models\Link
    {
        $payload = $this->prepare();

        $payload['form_params'] = [
            'destination' => $link->getDestination(),
        ];

        if (! empty($link->getSlashtag())) {
            $payload['form_params']['slashtag'] = $link->getSlashtag();
        }
        if (! empty($link->getTitle())) {
            $payload['form_params']['title'] = $link->getTitle();
        }
        if (! empty($link->getDomain())) {
            $domain = $link->getDomain();
            if (! empty($domain->getId())) {
                $payload['form_params']['domain']['id'] = $domain->getId();
            } else {
                $payload['form_params']['domain']['fullName'] = $domain->getFullName();
            }
        }

        $response = $this
            ->client
            ->request('POST', sprintf('links/%s', $link->getId()), $payload);

        return Models\Link::fromResponse($response);
    }

    /**
     * Delete a specific link.
     *
     * @param string $id
     * @return Models\Link
     */
    public function delete(string $id): Models\Link
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('DELETE', sprintf('links/%s', $id), $payload);

        return Models\Link::fromResponse($response);
    }

    /**
     * Get all tags attached to a specific link.
     *
     * @param string $id
     * @param Options|null $options
     * @return array<Models\Tag>
     */
    public function tags(string $id, Options $options = null): array
    {
        $payload = $this->prepare([], $options, [
            'orderBy',
            'orderDir',
            'limit',
            'last',
        ]);

        $response = $this
            ->client
            ->request('GET', sprintf('links/%s/tags', $id), $payload);

        return array_map(
            function (stdClass $tag) {
                return Models\Tag::fromResponse($tag);
            },
            $response
        );
    }

    /**
     * Get all scripts attached to a specific link.
     *
     * @param string $id
     * @param Options|null $options
     * @return array<Models\Script>
     */
    public function scripts(string $id, Options $options = null): array
    {
        $payload = $this->prepare([], $options, [
            'orderBy',
            'orderDir',
            'limit',
            'last',
        ]);

        $response = $this
            ->client
            ->request('GET', sprintf('links/%s/scripts', $id), $payload);

        return array_map(
            function (stdClass $script) {
                return Models\Script::fromResponse($script);
            },
            $response
        );
    }
}
