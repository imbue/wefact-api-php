<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Resources\Actions\MarkAsPaidAction;
use Imbue\WeFact\Resources\Actions\PartPaymentAction;

class CreditInvoiceLine extends Resource
{
    public const CONTROLLER_NAME = 'creditinvoiceline';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
