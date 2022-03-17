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

use ResellerIPTV\Abstracts\Endpoint;
use ResellerIPTV\Models\Admin\Channel;

class ChannelEndpoint extends Endpoint
{
    /**
     * @return array
     */
    public function list($name = null)
    {
        $channels = [];
        $adapter = $this->adapter->get('channel/list', ['name' => $name]);
        $this->body = json_decode($adapter->getBody());
        foreach ($this->body->result as $item) {
            $channel = new Channel();
            $channel->setAttributes($item);
            $channels[] = $channel;
        }
        return $channels;
    }
}
