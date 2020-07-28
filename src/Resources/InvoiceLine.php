<?php

namespace Dokter\WeFact\Resources;

use Dokter\WeFact\Exceptions\ApiException;
use Dokter\WeFact\Exceptions\MissingApiKeyException;
use Dokter\WeFact\Resources\Actions\DownloadAction;
use Dokter\WeFact\Resources\Actions\MarkAsPaidAction;

class InvoiceLine extends Resource
{
    public const CONTROLLER_NAME = 'invoiceline';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
