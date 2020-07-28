<?php

namespace Dokter\WeFact\Resources\Actions;

use Dokter\WeFact\Exceptions\ApiException;
use Dokter\WeFact\Exceptions\MissingApiKeyException;
use Dokter\WeFact\Resources\Resource;

trait DownloadAction
{
    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function download(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'download',
            $parameters
        );
    }
}
