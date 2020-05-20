<?php

namespace Dokter\WeFact\Resources;

class Invoice extends Resource
{
    public function getResourceName(): string
    {
        return 'invoices';
    }
}
