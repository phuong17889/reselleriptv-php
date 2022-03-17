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
use ResellerIPTV\Models\Admin\Package;
use ResellerIPTV\Traits\PageTrait;

class PackageEndpoint extends Endpoint
{
    use PageTrait;

    /**
     * @param $page_size
     * @param $page_number
     * @param $sort
     * @param $order
     * @return array
     */
    public function list($page_size = 20, $page_number = 1, $sort = 'created_at', $order = SORT_ASC)
    {
        $adapter = $this->adapter->get('package/list', ['page_size' => $page_size, 'page_number' => $page_number, 'sort' => $sort, 'order' => $order]);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        $this->setPage($result);
        return $this->setData(Package::class, $result);
    }

    /**
     * @param $id
     * @param $attributes
     * @return array
     */
    public function update($id, $attributes)
    {
        $adapter = $this->adapter->post('package/update?id=' . $id, $attributes);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        return $this->setObject(Package::class, $result);
    }
}
