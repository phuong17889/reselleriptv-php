<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/14/2022
 * @time    5:23 PM
 */
include "init.php";
$apiKey  = new \ResellerIPTV\Authentications\AdminAuth(BASE_API_KEY);
$adapter = new \ResellerIPTV\Adapters\AdminAdapter($apiKey, BASE_URL);
$channel = new \ResellerIPTV\Endpoints\Admin\ChannelEndpoint($adapter);
/**
 * Get all list of channels
 * var_dump($channel->list());
 *
 * Get all list with filter
 * var_dump($channel->list('VOD'));
 */
var_dump($channel->list('VOD'));
