<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/14/2022
 * @time    5:18 PM
 */

namespace phuong17889\reselleriptv\components;

use phuong17889\reselleriptv\interfaces\ObjectInterface;

abstract class Object implements ObjectInterface
{
    public function getAttributes()
    {
    }
}
