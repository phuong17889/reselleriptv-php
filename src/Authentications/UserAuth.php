<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    11:26 AM
 */

namespace ResellerIPTV\Authentications;

class UserAuth extends AdminAuth
{
    private $userKey;

    /**
     * @param $apiKey
     * @param $userKey
     */
    public function __construct($apiKey, $userKey)
    {
        parent::__construct($apiKey);
        $this->userKey = $userKey;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        $headers = parent::getHeaders();
        $headers['iptv-user-key'] = 'Bearer ' . $this->userKey;
        return $headers;
    }
}
