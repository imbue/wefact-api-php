<?php

namespace Imbue\WeFact\Resources\Actions;

use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;
use Imbue\WeFact\Resources\Resource;

trait ScheduleAction
{
    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function schedule(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'schedule',
            $parameters
        );
    }
}
