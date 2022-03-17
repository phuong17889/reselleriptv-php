<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/16/2022
 * @time    5:14 PM
 */

namespace ResellerIPTV\Models\Admin;

use ResellerIPTV\Abstracts\Model;

/**
 * @property int $id
 * @property string $name
 * @property double $amount
 * @property double $credit
 * @property string $type
 * @property boolean $is_trial
 * @property boolean $status
 * @property string $currency
 * @property boolean $client_status
 * @property int $max_connection
 * @property int $created_at
 * @property int $updated_at
 */
class Package extends Model
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return ['id', 'name', 'amount', 'credit', 'type', 'is_trial', 'status', 'currency', 'client_status', 'max_connection', 'created_at', 'updated_at'];
    }

    /**
     * @param $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (in_array($attribute, $this->attributes())) {
                if (in_array($attribute, ['is_trial', 'status', 'client_status'])) {
                    $this->$attribute = $value == 'yes';
                } else {
                    $this->$attribute = $value;
                }
            }
        }
        return $this;
    }
}
