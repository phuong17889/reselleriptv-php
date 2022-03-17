<?php
/**
 * Created by PhpStorm.
 * User: junade
 * Date: 06/06/2017
 * Time: 14:24
 */

namespace ResellerIPTV\Exceptions;

use Exception;
use Throwable;

class EndpointException extends Exception
{

    /**
     * @param $message
     * @param $code
     * @param Throwable|null $previous
     * @throws JsonException
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $response = json_decode($message, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException();
        }
        $message = $response['message'];
        $code = $response['code'];
        parent::__construct($message, $code, $previous);
    }
}
