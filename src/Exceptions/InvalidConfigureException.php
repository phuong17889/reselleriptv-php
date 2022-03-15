<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    10:44 AM
 */

namespace ResellerIPTV\Exceptions;

use Exception;

class InvalidConfigureException extends Exception
{
    /**
     * @return string
     */
    public function getName()
    {
        return "Invalid configure";
    }
}
