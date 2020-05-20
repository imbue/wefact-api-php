<?php

namespace Dokter\WeFact\Resources;

use Dokter\WeFact\Exceptions\MissingApiKeyException;
use Dokter\WeFact\WeFact;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

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
     * @param array $data
     * @return ResponseInterface
     * @throws MissingApiKeyException
     * @throws GuzzleException
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
     * @return string
     */
    abstract public function getResourceName(): string;
}
