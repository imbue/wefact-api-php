<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;
use Imbue\WeFact\Resources\Actions\DownloadAction;
use Imbue\WeFact\Resources\Actions\MarkAsPaidAction;

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
