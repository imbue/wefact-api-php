# PHP Library for WeFact

![](https://github.com/patrickdokter/wefact-api-php/workflows/tests/badge.svg)


## Getting started

Initializing the WeFact client
```
$client = new WeFact();
$client->setApiToken($yourApiToken);

$invoices = $client->invoices->list();
```
