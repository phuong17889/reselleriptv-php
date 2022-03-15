<?php
/**
 * Created by PhpStorm.
 * User: junade
 * Date: 19/09/2017
 * Time: 16:57
 */

namespace ResellerIPTV\Exceptions;

use Exception;

class ConfigurationException extends Exception
{
    /**
     * @return string
     */
    public function getName()
    {
        return "Invalid configuration";
    }
}
