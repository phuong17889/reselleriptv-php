<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:36 PM
 */

namespace ResellerIPTV\Models\Admin;

use ResellerIPTV\Abstracts\Model;

class Channel extends Model
{

    /**
     * @return array
     */
    public function attributes()
    {
        return ['id', 'name'];
    }
}
