# PHP Library for WeFact

![](https://github.com/imbue/wefact-api-php/workflows/tests/badge.svg)

PHP library for online invoicing software [wefact.nl](https://wefact.nl)


## Getting started

Initializing the WeFact client
```php
$client = new WeFact();
$client->setApiToken($yourApiToken);
```

Retrieve multiple invoices
```php
$invoices = $client->invoices->list();
```

Get a single invoice
```php
$invoices = $client->invoices->show([
    'InvoiceCode' => 'F0001',
]);
```

Creating an invoice
```php
$invoice = $client->invoices->create([
    'DebtorCode' => 'DB10000',
    'InvoiceLines' => [
        [
            'Number' => 2,
            'ProductCode' => 'P0001'
        ],
        [
            'Description' => 'Reiskosten à € 0,19 per km',
            'PriceExcl' => 0.19
        ]
    ]
 ]);
```

Updating an invoice
```php
$invoice = $client->invoices->edit([
    'Identifier' => 1,
    'Discount' => 10,
    'Term' => 30,
 ]);
```

Deleting an invoice
```php
$invoice = $client->invoices->delete([
    'Identifier' => 1,
 ]);
```

Downloading an attachment
```php
$invoices = $client->attachments->download([
    'ReferenceIdentifier' => '1',
    'Type' => 'pricequote',
    'Filename' => 'sample.pdf',
]);
```


### Available controllers

- Attachment
- Credit invoice
- Credit invoice lines
- Debtor
- Group
- Invoice
- Invoice line
- Price quote
- Price quote line
- Product
- Settings
- Subscription
