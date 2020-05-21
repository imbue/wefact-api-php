<?php

namespace Tests\Resources;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class InvoiceResourceTest extends BaseResourceTest
{
    public function testListInvoices()
    {
        $this->mockApiCall(
            new Request('POST', ''),
            new Response(
                200,
                [],
                '{
    "controller": "invoice",
    "action": "list",
    "status": "success",
    "date": "2019-12-01T14:05:21+02:00",
    "totalresults": "1",
    "currentresults": "1",
    "offset": "0",
    "invoices": [
        {
            "Identifier": "1",
            "InvoiceCode": "F0001",
            "Debtor": "1",
            "DebtorCode": "DB10000",
            "CompanyName": "Jan Janssen B.V.",
            "Initials": "Jan",
            "SurName": "Janssen",
            "AmountExcl": "229.64",
            "AmountIncl": "277.86",
            "Currency": "EUR",
            "Date": "2019-10-22",
            "Status": "4",
            "SubStatus": "",
            "Sent": "1",
            "SentDate": "2019-12-01 00:00:00",
            "Reminders": "0",
            "ReminderDate": "",
            "Summations": "0",
            "SummationDate": "",
            "Modified": "2019-12-01 13:05:21"
        }
    ]
}'));

        $data = $this->weFact->invoices->list();

        $this->assertIsArray($data);
        $this->assertEquals('invoice', $data['controller']);
        $this->assertEquals('list', $data['action']);
        $this->assertEquals('1', $data['totalresults']);
        $this->assertCount(1, $data['invoices']);

        $invoice = $data['invoices'][0];
        $this->assertEquals('F0001', $invoice['InvoiceCode']);
        $this->assertEquals('1', $invoice['Identifier']);
    }

    public function testShowInvoice()
    {
        $this->mockApiCall(
            new Request('POST', ''),
            new Response(
                200,
                [],
                '{
    "controller": "invoice",
    "action": "show",
    "status": "success",
    "date": "2019-12-01T14:05:21+02:00",
    "invoice": {
        "Identifier": "1",
        "InvoiceCode": "F0001",
        "Debtor": "1",
        "DebtorCode": "DB10000",
        "Status": "4",
        "SubStatus": "",
        "Date": "2019-10-22",
        "Term": "14",
        "PayBefore": "2019-11-05",
        "PaymentURL": "",
        "AmountExcl": "229.64",
        "AmountTax": "48.22",
        "AmountIncl": "277.86",
        "AmountPaid": "0.00",
        "Discount": "0",
        "VatCalcMethod": "excl",
        "IgnoreDiscount": "no",
        "Coupon": "",
        "ReferenceNumber": "",
        "CompanyName": "Jan Janssen B.V.",
        "Initials": "Jan",
        "SurName": "Janssen",
        "Sex": "m",
        "Address": "Keizersgracht 100",
        "ZipCode": "1015 AA",
        "City": "Amsterdam",
        "Country": "NL",
        "EmailAddress": "info@example.com",
        "InvoiceMethod": "0",
        "SentDate": "2019-12-01 00:00:00",
        "Sent": "1",
        "Reminders": "0",
        "ReminderDate": "",
        "Summations": "0",
        "SummationDate": "",
        "Authorisation": "no",
        "PaymentMethod": "wire",
        "PayDate": "",
        "TransactionID": "",
        "LanguageCode": "nl_nl",
        "Currency": "EUR",
        "Description": "",
        "Comment": "",
        "InvoiceLines": [
            {
                "Identifier": "1",
                "Date": "2019-10-22",
                "Number": "2",
                "NumberSuffix": "",
                "ProductCode": "P0001",
                "Description": "Werkzaamheden gebaseerd op uurtarief",
                "PriceExcl": "100",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            },
            {
                "Identifier": "2",
                "Date": "2019-10-22",
                "Number": "155",
                "NumberSuffix": "km",
                "ProductCode": "P0002",
                "Description": "Reiskosten \u00e0 \u20ac 0,19 per km",
                "PriceExcl": "0.19",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            },
            {
                "Identifier": "3",
                "Date": "2019-10-22",
                "Number": "1",
                "NumberSuffix": "",
                "ProductCode": "P0002",
                "Description": "Reiskosten \u00e0 \u20ac 0,19 per km",
                "PriceExcl": "0.19",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            }
        ],
        "Created": "2019-12-01 13:05:21",
        "Modified": "2019-12-01 13:05:21",
        "VatShift": "no",
        "Translations": {
            "Status": "Betaald",
            "Country": "Nederland",
            "InvoiceMethod": "Per e-mail",
            "PaymentMethod": "Bankoverschrijving",
            "LanguageLabel": "Nederlands"
        }
    }
}'));

        $data = $this->weFact->invoices->show([
            'InvoiceCode' => 'F0001'
        ]);

        $this->assertIsArray($data);
        $this->assertEquals('invoice', $data['controller']);
        $this->assertEquals('show', $data['action']);

        $this->assertEquals('F0001', $data['invoice']['InvoiceCode']);
        $this->assertEquals('1', $data['invoice']['Identifier']);
        $this->assertCount(3, $data['invoice']['InvoiceLines']);
    }

    public function testCreateInvoice()
    {
        $this->mockApiCall(
            new Request('POST', ''),
            new Response(
                200,
                [],
                '{
    "controller": "invoice",
    "action": "add",
    "status": "success",
    "date": "2019-12-01T14:05:21+02:00",
    "invoice": {
        "Identifier": "1",
        "InvoiceCode": "[concept]0001",
        "Debtor": "1",
        "DebtorCode": "DB10000",
        "Status": "0",
        "SubStatus": "",
        "Date": "2019-11-20",
        "Term": "14",
        "PayBefore": "2019-12-04",
        "PaymentURL": "",
        "AmountExcl": "200.19",
        "AmountTax": "42.04",
        "AmountIncl": "242.23",
        "AmountPaid": "0.00",
        "Discount": "0",
        "VatCalcMethod": "excl",
        "IgnoreDiscount": "no",
        "Coupon": "",
        "ReferenceNumber": "",
        "CompanyName": "Jan Janssen B.V.",
        "Initials": "Jan",
        "SurName": "Janssen",
        "Sex": "m",
        "Address": "Keizersgracht 100",
        "ZipCode": "1015 AA",
        "City": "Amsterdam",
        "Country": "NL",
        "EmailAddress": "info@example.com",
        "InvoiceMethod": "0",
        "ScheduledAt": "",
        "SentDate": "",
        "Sent": "0",
        "Reminders": "0",
        "ReminderDate": "",
        "Summations": "0",
        "SummationDate": "",
        "Authorisation": "no",
        "PaymentMethod": "",
        "PayDate": "",
        "TransactionID": "",
        "LanguageCode": "nl_nl",
        "Currency": "EUR",
        "Description": "",
        "Comment": "",
        "InvoiceLines": [
            {
                "Identifier": "1",
                "Date": "2019-11-20",
                "Number": "2",
                "NumberSuffix": "",
                "ProductCode": "P0001",
                "Description": "Werkzaamheden gebaseerd op uurtarief",
                "PriceExcl": "100",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            },
            {
                "Identifier": "2",
                "Date": "2019-11-20",
                "Number": "1",
                "NumberSuffix": "",
                "ProductCode": "",
                "Description": "Reiskosten \u00e0 \u20ac 0,19 per km",
                "PriceExcl": "0.19",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            }
        ],
        "Created": "2019-12-01 13:05:21",
        "Modified": "2019-12-01 13:05:21",
        "VatShift": "no",
        "Translations": {
            "Status": "Concept",
            "Country": "Nederland",
            "InvoiceMethod": "Per e-mail",
            "PaymentMethod": "",
            "LanguageLabel": "Nederlands"
        }
    }
}'
            )
        );

        $data = $this->weFact->invoices->create([
            'InvoiceCode' => "[concept]0001",
        ]);

        $this->assertIsArray($data);
        $this->assertEquals('invoice', $data['controller']);
        $this->assertEquals('add', $data['action']);
        $this->assertEquals('[concept]0001', $data['invoice']['InvoiceCode']);
    }

    public function testEditInvoice()
    {
        $this->mockApiCall(
            new Request('POST', ''),
            new Response(
                200,
                [],
                '{
    "controller": "invoice",
    "action": "edit",
    "status": "success",
    "date": "2019-12-01T14:05:21+02:00",
    "invoice": {
        "Identifier": "1",
        "InvoiceCode": "[concept]0001",
        "Debtor": "1",
        "DebtorCode": "DB10000",
        "Status": "0",
        "SubStatus": "",
        "Date": "2019-10-22",
        "Term": "30",
        "PayBefore": "2019-11-21",
        "PaymentURL": "",
        "AmountExcl": "206.68",
        "AmountTax": "43.40",
        "AmountIncl": "250.08",
        "AmountPaid": "0.00",
        "Discount": "10",
        "VatCalcMethod": "excl",
        "IgnoreDiscount": "no",
        "Coupon": "",
        "ReferenceNumber": "",
        "CompanyName": "Jan Janssen B.V.",
        "Initials": "Jan",
        "SurName": "Janssen",
        "Sex": "m",
        "Address": "Keizersgracht 100",
        "ZipCode": "1015 AA",
        "City": "Amsterdam",
        "Country": "NL",
        "EmailAddress": "info@example.com",
        "InvoiceMethod": "0",
        "ScheduledAt": "",
        "SentDate": "",
        "Sent": "0",
        "Reminders": "0",
        "ReminderDate": "",
        "Summations": "0",
        "SummationDate": "",
        "Authorisation": "no",
        "PaymentMethod": "",
        "PayDate": "",
        "TransactionID": "",
        "LanguageCode": "nl_nl",
        "Currency": "EUR",
        "Description": "",
        "Comment": "",
        "InvoiceLines": [
            {
                "Identifier": "1",
                "Date": "2019-10-22",
                "Number": "2",
                "NumberSuffix": "",
                "ProductCode": "P0001",
                "Description": "Werkzaamheden gebaseerd op uurtarief",
                "PriceExcl": "100",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            },
            {
                "Identifier": "2",
                "Date": "2019-10-22",
                "Number": "155",
                "NumberSuffix": "km",
                "ProductCode": "P0002",
                "Description": "Reiskosten \u00e0 \u20ac 0,19 per km",
                "PriceExcl": "0.19",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            },
            {
                "Identifier": "3",
                "Date": "2019-10-22",
                "Number": "1",
                "NumberSuffix": "",
                "ProductCode": "P0002",
                "Description": "Reiskosten \u00e0 \u20ac 0,19 per km",
                "PriceExcl": "0.19",
                "DiscountPercentage": "0",
                "DiscountPercentageType": "line",
                "TaxCode": "V21",
                "TaxPercentage": "21",
                "PeriodicID": "0",
                "Periods": "1",
                "Periodic": "",
                "StartDate": "",
                "EndDate": "",
                "StartPeriod": "",
                "EndPeriod": ""
            }
        ],
        "Created": "2019-12-01 13:05:21",
        "Modified": "2019-12-01 13:05:21",
        "VatShift": "no",
        "Translations": {
            "Status": "Concept",
            "Country": "Nederland",
            "InvoiceMethod": "Per e-mail",
            "PaymentMethod": "",
            "LanguageLabel": "Nederlands"
        }
    }
}'
            ));

        $data = $this->weFact->invoices->edit([
            'Identifier' => 1,
            'Discount' => 10,
            'Term' => 30
        ]);

        $this->assertIsArray($data);
        $this->assertEquals('invoice', $data['controller']);
        $this->assertEquals('edit', $data['action']);
        $this->assertEquals('[concept]0001', $data['invoice']['InvoiceCode']);
    }

    public function testDeleteInvoice()
    {
        $this->mockApiCall(
            new Request('POST', ''),
            new Response(
                200,
                [],
                '{
    "controller": "invoice",
    "action": "delete",
    "status": "success",
    "date": "2019-12-01T14:05:21+02:00",
    "success": [
        "Conceptfactuur [concept]0001 is verwijderd."
    ]
}'));

        $data = $this->weFact->invoices->delete([
            'Identifier' => 1,
        ]);

        $this->assertIsArray($data);
        $this->assertEquals('invoice', $data['controller']);
        $this->assertEquals('delete', $data['action']);
        $this->assertEquals('success', $data['status']);
        $this->assertEquals('Conceptfactuur [concept]0001 is verwijderd.', $data['success'][0]);
    }
}
