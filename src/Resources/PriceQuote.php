<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;
use Imbue\WeFact\Resources\Actions\CancelScheduleAction;
use Imbue\WeFact\Resources\Actions\DownloadAction;
use Imbue\WeFact\Resources\Actions\ScheduleAction;
use Imbue\WeFact\Resources\Actions\SendByEmailAction;

class PriceQuote extends Resource
{
    use DownloadAction, CancelScheduleAction, ScheduleAction, SendByEmailAction;

    public const CONTROLLER_NAME = 'pricequote';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function archive(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'archive',
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
    public function decline(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'decline',
            $parameters
        );
    }
}
