# PHP Library for WeFact

![](https://github.com/patrickdokter/wefact-api-php/workflows/tests/badge.svg)

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
