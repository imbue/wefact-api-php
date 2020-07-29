<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Resources\Actions\MarkAsPaidAction;
use Imbue\WeFact\Resources\Actions\PartPaymentAction;

class CreditInvoice extends Resource
{
    use MarkAsPaidAction, PartPaymentAction;

    public const CONTROLLER_NAME = 'creditinvoice';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }
}
