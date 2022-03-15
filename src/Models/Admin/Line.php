<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:53 PM
 */

namespace ResellerIPTV\Models\Admin;

use ResellerIPTV\Abstracts\Model;

class Line extends Model
{

    /**
     * @return array
     */
    public function attributes()
    {
        return ['id', 'username', 'password', 'mac_address', 'max_connections', 'portal', 'reseller_notes', 'allowed_ips', 'exp_date', 'admin_enabled', 'enabled', 'bouquet', 'created_at', 'updated_at'];
    }
}
