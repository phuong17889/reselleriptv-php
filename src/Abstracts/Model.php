<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:42 PM
 */

namespace ResellerIPTV\Abstracts;

use ResellerIPTV\Interfaces\ObjectInterface;

/**
 * @property array $attributes
 */
abstract class Model implements ObjectInterface
{

    /**
     * @param $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if (in_array($attribute, $this->attributes())) {
                $this->$attribute = $value;
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        $response = [];
        foreach ($this->attributes() as $attribute) {
            $response[$attribute] = $this->$attribute;
        }
        return $response;
    }

    /**
     * @param $name
     * @param $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        return '';
    }
}
