<?php
/**
 * Created by FES VPN.
 * @project test
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    4:25 PM
 */
require "../vendor/autoload.php";
$apiKey = new \ResellerIPTV\Authentications\AdminAuth('X9oraqCNNvkgwLS5FgUTMJTN12JVNXza');
$adapter = new \ResellerIPTV\Adapters\AdminAdapter($apiKey, 'http://api.reselleriptv.demo/v1/admin/');
$line = new \ResellerIPTV\Endpoints\Admin\CouponEndpoint($adapter);
echo '<pre>';
print_r($line->getList(2));
