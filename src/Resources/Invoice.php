<?php

namespace Dokter\WeFact\Resources;

use Dokter\WeFact\Exceptions\ApiException;
use Dokter\WeFact\Exceptions\MissingApiKeyException;
use Dokter\WeFact\Resources\Actions\DownloadAction;
use Dokter\WeFact\Resources\Actions\MarkAsPaidAction;

class Invoice extends Resource
{
    use DownloadAction, MarkAsPaidAction;

    public function getResourceName(): string
    {
        return 'invoice';
    }
}
