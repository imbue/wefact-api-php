<?php

namespace Tests\Resources;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class InvoiceResourceTest extends BaseResourceTest
{
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
        $this->assertEquals('[concept]0001', $data['invoice']['InvoiceCode']);
    }
}
