<?php

namespace Dokter\WeFact;

use Dokter\WeFact\Exceptions\ApiException;
use Psr\Http\Message\ResponseInterface;

class ResponseFactory
{
    /**
     * @param ResponseInterface $httpResponse
     * @return mixed
     * @throws ApiException
     */
    public static function createFromHttpResponse(ResponseInterface $httpResponse)
    {
        $body = (string)$httpResponse->getBody();
        $decodedBody = \json_decode($body, true);

        if (isset($decodedBody['error'])) {
            $errors = implode(', ', $decodedBody['message']);
            throw new ApiException($errors);
        }

        return $decodedBody;
    }
}
