<?php

namespace Dokter\WeFact\Resources;

class Group extends Resource
{
    public const CONTROLLER_NAME = 'group';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
