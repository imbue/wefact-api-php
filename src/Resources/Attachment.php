<?php

namespace Dokter\WeFact\Resources;

use Dokter\WeFact\Exceptions\ActionNotAvailableException;
use Dokter\WeFact\Exceptions\ApiException;
use Dokter\WeFact\Exceptions\MissingApiKeyException;

class Attachment extends Resource
{
    public const CONTROLLER_NAME = 'attachment';

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

    /**
     * @param array $parameters
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function list(array $parameters = [])
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }

    /**
     * @param array $data
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function edit(array $data)
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }
}
