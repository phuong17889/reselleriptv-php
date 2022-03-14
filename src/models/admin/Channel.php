<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/14/2022
 * @time    5:00 PM
 */

namespace phuong17889\reselleriptv\models\admin;

use phuong17889\reselleriptv\models\Admin;

class Channel extends Admin
{

    public function attributes()
    {
        return ['id', 'name'];
    }
}
