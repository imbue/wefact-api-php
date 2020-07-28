<?php

namespace Dokter\WeFact\Resources;

class PriceQuoteLine extends Resource
{
    public const CONTROLLER_NAME = 'pricequoteline';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
