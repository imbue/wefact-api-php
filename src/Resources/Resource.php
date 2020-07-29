<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;
use Imbue\WeFact\WeFact;
use GuzzleHttp\Exception\GuzzleException;

abstract class Resource
{
    public const ACTION_LIST = 'list';
    public const ACTION_SHOW = 'show';
    public const ACTION_CREATE = 'add';
    public const ACTION_EDIT = 'edit';
    public const ACTION_DELETE = 'delete';

    /**
     * @var WeFact $client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param WeFact $client
     */
    public function __construct(WeFact $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function list(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            self::ACTION_LIST,
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function show(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            self::ACTION_SHOW,
            $parameters
        );
    }

    /**
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws MissingApiKeyException
     * @throws ApiException
     */
    public function create(array $data)
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            self::ACTION_CREATE,
            $data
        );
    }

    /**
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     * @throws MissingApiKeyException
     * @throws ApiException
     */
    public function edit(array $data)
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            self::ACTION_EDIT,
            $data
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function delete(array $parameters)
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            self::ACTION_DELETE,
            $parameters
        );
    }

    /**
     * @return string
     */
    abstract public function getResourceName(): string;
}
