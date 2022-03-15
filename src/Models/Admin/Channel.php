<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:36 PM
 * @version 1.0.0
 */

namespace ResellerIPTV\Models\Admin;

use ResellerIPTV\Abstracts\Model;

/**
 * Class Channel, return available channel
 * @property int $id
 * @property string $name
 */
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
