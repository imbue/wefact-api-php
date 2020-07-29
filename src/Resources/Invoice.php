<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;
use Imbue\WeFact\Resources\Actions\DownloadAction;
use Imbue\WeFact\Resources\Actions\MarkAsPaidAction;
use Imbue\WeFact\Resources\Actions\PartPaymentAction;

class Invoice extends Resource
{
    use DownloadAction, MarkAsPaidAction, PartPaymentAction;

    public const CONTROLLER_NAME = 'invoice';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
