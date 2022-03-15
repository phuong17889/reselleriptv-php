<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    11:01 AM
 * @version 1.0.0
 */

namespace ResellerIPTV\Interfaces;

interface EndpointInterface
{
    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter);
}
