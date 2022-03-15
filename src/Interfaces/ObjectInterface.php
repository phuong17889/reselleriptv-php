<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:38 PM
 */

namespace ResellerIPTV\Interfaces;

interface ObjectInterface
{
    public function attributes();

    public function setAttributes($attributes);

    public function getAttributes();
}
