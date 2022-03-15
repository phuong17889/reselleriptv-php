<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:38 PM
 * @version 1.0.0
 */

namespace ResellerIPTV\Interfaces;

interface ObjectInterface
{
    /**
     * Declare attributes of object
     * @return array
     */
    public function attributes();

    /**
     * Set all attributes of object
     * @param $attributes
     * @return self
     */
    public function setAttributes($attributes);

    /**
     * Retry all attributes of object
     * @return array
     */
    public function getAttributes();
}
