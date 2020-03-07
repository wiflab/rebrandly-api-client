<?php

namespace Vdhicts\Rebrandly\Endpoints;

use stdClass;
use Vdhicts\Rebrandly\Models;
use Vdhicts\Rebrandly\Support\Options;

class Tags extends Endpoint
{
    /**
     * Get a list of tags.
     *
     * @param Options|null $options
     * @return array<Models\Tag>
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
            ->request('GET', 'tags', $payload);

        return array_map(
            function (stdClass $domain) {
                return Models\Tag::fromResponse($domain);
            },
            $response
        );
    }

    /**
     * Get details about a specific tag.
     *
     * @param string $id
     * @return Models\Tag
     */
    public function get(string $id): Models\Tag
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('GET', sprintf('tags/%s', $id), $payload);

        return Models\Tag::fromResponse($response);
    }

    /**
     * Get how many tags with given filtering conditions.
     *
     * @param Options|null $options
     * @return int
     */
    public function count(Options $options = null): int
    {
        $payload = $this->prepare([], $options);

        $response = $this
            ->client
            ->request('GET', 'tags/count', $payload);

        return $response->count;
    }

    /**
     * Create a new tag.
     *
     * @param Models\Tag $tag
     * @return Models\Tag
     */
    public function create(Models\Tag $tag): Models\Tag
    {
        $payload = $this->prepare();

        $payload['form_params'] = [
            'name' => $tag->getName(),
            'color' => $tag->getColor(),
        ];

        $response = $this
            ->client
            ->request('POST', 'tags', $payload);

        return Models\Tag::fromResponse($response);
    }

    /**
     * Update a tag.
     * @param Models\Tag $tag
     * @return Models\Tag
     */
    public function update(Models\Tag $tag): Models\Tag
    {
        $payload = $this->prepare();

        $payload['form_params'] = [
            'name' => $tag->getName(),
            'color' => $tag->getColor(),
        ];

        $response = $this
            ->client
            ->request('POST', sprintf('tags/%s', $tag->getId()), $payload);

        return Models\Tag::fromResponse($response);
    }

    /**
     * Delete a specific tag.
     *
     * @param string $id
     * @return Models\Tag
     */
    public function delete(string $id): Models\Tag
    {
        $payload = $this->prepare();

        $response = $this
            ->client
            ->request('DELETE', sprintf('tags/%s', $id), $payload);

        return Models\Tag::fromResponse($response);
    }
}
