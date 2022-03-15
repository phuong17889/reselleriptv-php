<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/14/2022
 * @time    5:00 PM
 */

namespace ResellerIPTV\Endpoints\Admin;

use ResellerIPTV\Endpoints\Endpoint;

class Channel extends Endpoint
{
    public function getList()
    {
        $channel = $this->adapter->get('channel');
        $this->body = json_decode($channel->getBody());
        return $this->body->result;
    }
}
