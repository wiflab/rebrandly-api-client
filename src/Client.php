<?php

namespace Vdhicts\Rebrandly;

use Exception;
use GuzzleHttp;
use Vdhicts\Rebrandly\Exceptions\RebrandlyException;

class Client implements Contracts\Client
{
    public const API_URL = 'https://api.rebrandly.com/v1/';

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     * @throws RebrandlyException
     */
    public function __construct(string $apiKey)
    {
        if (empty(trim($apiKey))) {
            throw RebrandlyException::missingApiKey();
        }

        $this->client = new GuzzleHttp\Client([
            'base_uri' => self::API_URL,
            'timeout' => 60,
            'read_timeout' => 60,
            'connect_timeout' => 5,
            'headers' => [
                'Content-Type' => 'application/json',
                'apikey' => $apiKey,
            ],
        ]);
    }

    /**
     * Perform the request to the Rebrandly API.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $payload
     * @return mixed
     * @throws RebrandlyException
     */
    public function request(string $method, string $endpoint, array $payload = [])
    {
        try {
            $response = $this
                ->client
                ->request($method, $endpoint, $payload);
        } catch (Exception $exception) {
            throw RebrandlyException::failedRequest($exception->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            throw RebrandlyException::failedHttpStatusCode($method, $endpoint, $response);
        }

        return json_decode($response->getBody());
    }
}
