<?php
/**
 * Created by FES VPN.
 * @project test
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    4:25 PM
 */
require "init.php";
$apiKey = new \ResellerIPTV\Authentications\AdminAuth(BASE_API_KEY);
$adapter = new \ResellerIPTV\Adapters\AdminAdapter($apiKey, BASE_URL);
$coupon = new \ResellerIPTV\Endpoints\Admin\CouponEndpoint($adapter);
/**
 * Get all list of coupons
 * var_dump($coupon->list());
 *
 * Get all list with filter
 * $modelSearch = new \ResellerIPTV\Models\Admin\Coupon();
 * $modelSearch->discount_type = \ResellerIPTV\Models\Admin\Coupon::DISCOUNT_TYPE_AMOUNT;
 * $coupon->setFilterModel($modelSearch);
 * var_dump($coupon->list());
 *
 * Get all list with paging
 */
var_dump($coupon->list(1));

