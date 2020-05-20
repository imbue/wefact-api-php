<?php

namespace Tests;

use Dokter\WeFact\Exceptions\ApiException;
use Dokter\WeFact\Exceptions\MissingApiKeyException;
use Dokter\WeFact\WeFact;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

class ApiClientTest extends TestCase
{
    /** @var ClientInterface */
    private $guzzleClient;
    /** @var WeFact */
    private $weFact;

    protected function setUp()
    {
        parent::setUp();
        $this->guzzleClient = $this->createMock(Client::class);
        $this->weFact = new WeFact($this->guzzleClient);
    }

    /**
     * @throws GuzzleException
     * @throws MissingApiKeyException
     * @throws ApiException
     */
    public function testDoHttpCall()
    {
        $this->weFact->setApiKey('test_api_key');
        $response = new Response(200, [], '{"InvoiceCode": "[concept]0001"}');

        $this->guzzleClient
            ->expects($this->once())
            ->method('send')
            ->willReturn($response);

        $response = $this->weFact->doHttpCall('invoice', 'add');

        $this->assertEquals(
            ['InvoiceCode' => '[concept]0001'],
            $response
        );
    }

    /**
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function testRaiseMissingApiKeyExceptionWithoutApiKey()
    {
        $this->expectException(MissingApiKeyException::class);

        $this->weFact->doHttpCall('invoice', 'add');
    }
}
