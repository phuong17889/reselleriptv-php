<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    4:03 PM
 * @version 1.0.0
 */

namespace ResellerIPTV\Traits;

use stdClass;

trait PageTrait
{
    /**
     * Page size of result
     * @var int
     */
    public $page_size;

    /**
     * Current page number of result
     * @var int
     */
    public $page_number;

    /**
     * Total pages of result
     * @var int
     */
    public $total_page;

    /**
     * Total items of result
     * @var int
     */
    public $total_items;

    /**
     * @param stdClass $result
     * @return $this
     */
    public function setPage($result)
    {
        if (is_object($result)) {
            $result = json_decode(json_encode($result), true);
        }
        if (isset($result['page_size'])) {
            $this->page_size = $result['page_size'];
        }
        if (isset($result['page_number'])) {
            $this->page_number = $result['page_number'];
        }
        if (isset($result['total_page'])) {
            $this->total_page = $result['total_page'];
        }
        if (isset($result['total_items'])) {
            $this->total_items = $result['total_items'];
        }
        return $this;
    }

    /**
     * @param string $object
     * @param stdClass $result
     * @return array
     */
    public function setData($object, $result)
    {
        if (is_object($result)) {
            $result = json_decode(json_encode($result), true);
        }
        $models = [];
        if (isset($result['data'])) {
            foreach ($result['data'] as $item) {
                $model = new $object();
                $model->setAttributes($item);
                $models[] = $model;
            }
        }
        return $models;
    }

    /**
     * Page size of result
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Current page number of result
     * @return int
     */
    public function getPageNumber()
    {
        return $this->page_number;
    }

    /**
     * Total pages of result
     * @return int
     */
    public function getTotalPage()
    {
        return $this->total_page;
    }

    /**
     * Total items of result
     * @return int
     */
    public function getTotalItems()
    {
        return $this->total_items;
    }
}
