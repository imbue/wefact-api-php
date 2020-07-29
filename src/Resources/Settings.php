<?php

namespace Imbue\WeFact\Resources;

use Imbue\WeFact\Exceptions\ActionNotAvailableException;
use Imbue\WeFact\Exceptions\ApiException;
use Imbue\WeFact\Exceptions\MissingApiKeyException;

class Settings extends Resource
{
    public const CONTROLLER_NAME = 'settings';

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
     * @throws GuzzleException
     * @throws MissingApiKeyException
     */
    public function costCategoryCreate(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'costcategory_add',
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
    public function costCategoryEdit(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'costcategory_edit',
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
    public function costCategoryList(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'costcategory_list',
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
    public function costCategoryShow(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'costcategory_show',
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
    public function costCategoryDelete(array $parameters = [])
    {
        $controller = $this->getResourceName();

        return $this->client->doHttpCall(
            $controller,
            'costcategory_delete',
            $parameters
        );
    }

    /**
     * @param array $parameters
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function list(array $parameters = [])
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }

    /**
     * @param array $parameters
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function show(array $parameters = [])
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }

    /**
     * @param array $data
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function create(array $data)
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }

    /**
     * @param array $data
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function edit(array $data)
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }

    /**
     * @param array $parameters
     * @return mixed|void
     * @throws ActionNotAvailableException
     */
    public function delete(array $parameters)
    {
        throw new ActionNotAvailableException(
            sprintf('%s is not available for this controller.', __METHOD__)
        );
    }
}
