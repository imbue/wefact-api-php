<?php

namespace Dokter\WeFact;

use Dokter\WeFact\Exceptions\ApiException;
use Dokter\WeFact\Exceptions\MissingApiKeyException;
use Dokter\WeFact\Resources\Invoice;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class WeFact
{
    public const CLIENT_VERSION = '0.1.0';
    public const API_ENDPOINT = 'https://api.mijnwefact.nl';
    public const API_VERSION = 'v2';
    public const TIMEOUT = 15;
    private const HTTP_JSON = 'application/json';

    /** @var Client|ClientInterface|null */
    protected $httpClient;
    /** @var array */
    protected $userAgentComponent = [];
    /** @var string */
    private $apiKey;

    /** @var Invoice */
    public $invoices;


    /**
     * WeFact constructor.
     * @param ClientInterface|null $httpClient
     */
    public function __construct(ClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?
            $httpClient :
            new Client([
                RequestOptions::TIMEOUT => self::TIMEOUT,
            ]);

        $this->addUserAgentString("WeFact/" . self::CLIENT_VERSION);
        $this->addUserAgentString("PHP/" . phpversion());

        $this->invoices = new Invoice($this);
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return sprintf(
            '%s/%s',
            self::API_ENDPOINT,
            self::API_VERSION
        );
    }

    /**
     * @param string $controller
     * @param string $action
     * @param array $body
     * @return mixed
     * @throws Exceptions\ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function doHttpCall(string $controller, string $action, array $body = [])
    {
        if (!$this->apiKey) {
            throw new MissingApiKeyException('Missing API Key.');
        }

        $headers = [
            'Accept' => self::HTTP_JSON,
            'Content-Type' => self::HTTP_JSON,
            'User-Agent' => implode(' ', $this->userAgentComponent)
        ];

        $body['controller'] = $controller;
        $body['action'] = $action;

        $request = new Request('POST', $this->getApiUrl(), $headers, $this->parseRequestBody($body));
        $response = $this->httpClient->send($request);
        return $this->parseResponse($response);
    }

    /**
     * @param array $body
     * @return null|string
     * @throws ApiException
     */
    protected function parseRequestBody(array $body)
    {
        if (empty($body)) {
            return null;
        }

        try {
            $encoded = \GuzzleHttp\json_encode($body);
        } catch (\InvalidArgumentException $e) {
            throw new ApiException("Error encoding parameters into JSON: '" . $e->getMessage() . "'.");
        }

        return $encoded;
    }

    /**
     * @param ResponseInterface $httpResponse
     * @return mixed
     * @throws Exceptions\ApiException
     */
    public function parseResponse(ResponseInterface $httpResponse)
    {
        return ResponseFactory::createFromHttpResponse($httpResponse);
    }

    /**
     * @param string $string
     * @return $this
     */
    public function addUserAgentString(string $string)
    {
        $this->userAgentComponent[] = str_replace([" ", "\t", "\n", "\r"], '-', $string);
        return $this;
    }
}
