<?php

namespace Imbue\WeFact\Resources;

class Product extends Resource
{
    public const CONTROLLER_NAME = 'product';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
