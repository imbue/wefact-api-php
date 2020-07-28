<?php

namespace Dokter\WeFact\Resources;

use Dokter\WeFact\Exceptions\ActionNotAvailableException;

class Debtor extends Resource
{
    public const CONTROLLER_NAME = 'debtor';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @param array $parameters
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function delete(array $parameters)
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }
}
