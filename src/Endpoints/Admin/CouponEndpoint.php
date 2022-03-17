<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/16/2022
 * @time    5:13 PM
 */

namespace ResellerIPTV\Endpoints\Admin;

use ResellerIPTV\Abstracts\Endpoint;
use ResellerIPTV\Models\Admin\Coupon;
use ResellerIPTV\Traits\PageTrait;

class CouponEndpoint extends Endpoint
{
    use PageTrait;

    /**
     * @param $page_size
     * @param $page_number
     * @param $sort
     * @param $order
     * @return array
     */
    public function getList($page_size = 20, $page_number = 1, $sort = 'created_at', $order = SORT_ASC)
    {
        $adapter = $this->adapter->get('coupon/list', ['page_size' => $page_size, 'page_number' => $page_number, 'sort' => $sort, 'order' => $order]);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        $this->setPage($result);
        return $this->setData(Coupon::class, $result);
    }


    /**
     * @param $id
     * @param $attributes
     * @return array
     */
    public function update($id, $attributes)
    {
        $adapter = $this->adapter->post('coupon/update?id=' . $id, $attributes);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        return $this->setObject(Coupon::class, $result);

    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->adapter->delete('coupon/delete?id=' . $id);
        return true;
    }

    /**
     * @param $attributes
     * @return array
     */
    public function create($attributes)
    {
        $adapter = $this->adapter->post('coupon/create', $attributes);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        return $this->setObject(Coupon::class, $result);
    }
}
