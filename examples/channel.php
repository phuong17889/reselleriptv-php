<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/14/2022
 * @time    5:23 PM
 */
require "../vendor/autoload.php";
$apiKey = new \ResellerIPTV\Authentications\AdminAuth('X9oraqCNNvkgwLS5FgUTMJTN12JVNXza');
$adapter = new \ResellerIPTV\Adapters\AdminAdapter($apiKey, 'http://api.reselleriptv.demo/v1/admin/');
$channel = new \ResellerIPTV\Endpoints\Admin\ChannelEndpoint($adapter);
echo '<pre>';
print_r($channel->list('VOD'));
die;
