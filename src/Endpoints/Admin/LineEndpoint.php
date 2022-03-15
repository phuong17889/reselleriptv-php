<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    3:53 PM
 */

namespace ResellerIPTV\Endpoints\Admin;

use ResellerIPTV\Abstracts\Endpoint;
use ResellerIPTV\Models\Admin\Line;
use ResellerIPTV\Traits\PageTrait;

class LineEndpoint extends Endpoint
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
        $adapter = $this->adapter->get('line/list', ['page_size' => $page_size, 'page_number' => $page_number, 'sort' => $sort, 'order' => $order]);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        $this->setPage($result);
        return $this->setData(Line::class, $result);
    }
}
