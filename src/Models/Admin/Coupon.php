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
 * @property double $discount
 * @property string $discount_type
 * @property int $count
 * @property int $created_at
 * @property int $updated_at
 * @property int $expired_at
 * @property string $code
 * @property Package[] $packages
 */
class Coupon extends Model
{

    /**
     * @return string[]
     */
    public function attributes()
    {
        return ['id', 'discount', 'discount_type', 'code', 'packages', 'created_at', 'updated_at', 'code', 'expired_at'];
    }

    /**
     * @param $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (in_array($attribute, $this->attributes())) {
                if ($attribute == 'packages') {
                    foreach ($value as $package_value) {
                        $package = new Package();
                        $package->setAttributes($package_value);
                        if ($this->packages != null) {
                            $this->packages[] = $package;
                        } else {
                            $this->packages = [$package];
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
