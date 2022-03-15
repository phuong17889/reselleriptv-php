<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:53 PM
 * @version 1.0.0
 */

namespace ResellerIPTV\Models\Admin;

use ResellerIPTV\Abstracts\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $mac_address
 * @property int $max_connections
 * @property string $portal
 * @property string $reseller_notes
 * @property array $allowed_ips
 * @property int $exp_date
 * @property int $admin_enabled
 * @property int $enabled
 * @property Channel[] $channels
 * @property int $created_at
 * @property int $updated_at
 */
class Line extends Model
{

    /**
     * @return array
     */
    public function attributes()
    {
        return ['id', 'username', 'password', 'mac_address', 'max_connections', 'portal', 'reseller_notes', 'allowed_ips', 'exp_date', 'admin_enabled', 'enabled', 'channels', 'created_at', 'updated_at'];
    }

    /**
     * @param $attributes
     * @return $this|Line
     */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (in_array($attribute, $this->attributes())) {
                if ($attribute == 'channels') {
                    foreach ($value as $channel_value) {
                        $channel = new Channel();
                        $channel->setAttributes($channel_value);
                        if ($this->channels != null) {
                            $this->channels[] = $channel;
                        } else {
                            $this->channels = [$channel];
                        }
                    }
                } else {
                    $this->$attribute = $value;
                }
            }
        }
        return $this;
    }
}
