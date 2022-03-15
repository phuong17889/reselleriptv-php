<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:17 PM
 */

namespace ResellerIPTV\Endpoints;

use ResellerIPTV\Interfaces\AdapterInterface;
use ResellerIPTV\Interfaces\EndpointInterface;

class Endpoint implements EndpointInterface
{

    protected $adapter;
    protected $body;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
}
