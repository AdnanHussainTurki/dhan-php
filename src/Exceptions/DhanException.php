<?php

namespace AdnanHussainTurki\Dhan\Exceptions;

class DhanException extends \Exception
{
    public function __construct($response)
    {
        if (is_string($response)) {
            parent::__construct($response);
            return;
        }
        if (is_array($response)) {
            $response = json_encode($response);
        }

        $response = json_decode($response);
        parent::__construct($response->internalErrorCode . " | " . $response->internalErrorMessage, 400);
    }
}
