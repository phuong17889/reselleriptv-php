<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    11:25 AM
 */

namespace ResellerIPTV\Authentications;

use ResellerIPTV\Interfaces\AuthenticationInterface;

class AdminAuth implements AuthenticationInterface
{
    private $apiKey;

    /**
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return [
            'iptv-api-key' => 'Bearer ' . $this->apiKey
        ];
    }
}
