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
$line = new \ResellerIPTV\Endpoints\Admin\PackageEndpoint($adapter);
//todo cần kiểm tra lại tình trạng ko thể lấy dc theo bearer đã truyền lên, cần kiểm tra ex
echo '<pre>';
//print_r($line->getList(2));
//print_r($line->total_items);
print_r($line->update(17, ['name' => 'Trial 24h1']));
