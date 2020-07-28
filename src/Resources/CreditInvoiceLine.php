<?php

namespace Dokter\WeFact\Resources;

use Dokter\WeFact\Resources\Actions\MarkAsPaidAction;
use Dokter\WeFact\Resources\Actions\PartPaymentAction;

class CreditInvoiceLine extends Resource
{
    public const CONTROLLER_NAME = 'creditinvoiceline';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
