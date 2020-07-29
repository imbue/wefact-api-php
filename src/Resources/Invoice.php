<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;
use Imbue\WeFact\Resources\Actions\CancelScheduleAction;
use Imbue\WeFact\Resources\Actions\DownloadAction;
use Imbue\WeFact\Resources\Actions\MarkAsPaidAction;
use Imbue\WeFact\Resources\Actions\PartPaymentAction;
use Imbue\WeFact\Resources\Actions\ScheduleAction;
use Imbue\WeFact\Resources\Actions\SendByEmailAction;

class Invoice extends Resource
{
    use DownloadAction, MarkAsPaidAction, PartPaymentAction, CancelScheduleAction, ScheduleAction, SendByEmailAction;

    public const CONTROLLER_NAME = 'invoice';

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws MissingApiKeyException
     */
    public function block(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'block',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws MissingApiKeyException
     */
    public function credit(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'credit',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function markAsUnpaid(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'markasunpaid',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function paymentProcessPause(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'paymentprocesspause',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function paymentProcessReactivate(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'paymentprocessreactivate',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function sendReminderByEmail(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'sendreminderbyemail',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function sendSummationByEmail(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'sendsummationbyemail',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function unblock(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'unblock',
            $parameters
        );
    }
}
