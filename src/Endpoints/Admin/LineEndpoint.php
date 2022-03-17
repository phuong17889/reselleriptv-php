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
use ResellerIPTV\Abstracts\Model;
use ResellerIPTV\Models\Admin\Line;
use ResellerIPTV\Traits\PageTrait;

class LineEndpoint extends Endpoint
{
    use PageTrait;

    /**
     * @var Model
     */
    private $filterModel = null;

    /**
     * @param $page_size
     * @param $page_number
     * @param $sort
     * @param $order
     * @return array
     */
    public function list($page_size = 20, $page_number = 1, $sort = 'created_at', $order = SORT_ASC)
    {
        $adapter = $this->adapter->get('line/list', ['page_size' => $page_size, 'page_number' => $page_number, 'sort' => $sort, 'order' => $order, 'LineSearch' => $this->filterModel != null ? $this->filterModel->getAttributes() : []]);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        $this->setPage($result);
        return $this->setData(Line::class, $result);
    }

    /**
     * @param $id
     * @param $attributes
     * @return array
     */
    public function update($id, $attributes)
    {
        $adapter = $this->adapter->post('line/update?id=' . $id, $attributes);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        return $this->setObject(Line::class, $result);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->adapter->post('line/delete?id=' . $id);
        return true;
    }

    /**
     * @param $attributes
     * @return array
     */
    public function create($attributes)
    {
        $adapter = $this->adapter->post('line/create', $attributes);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        return $this->setObject(Line::class, $result);
    }

    /**
     * @param $id
     * @return array
     */
    public function view($id)
    {
        $adapter = $this->adapter->get('line/view?id=' . $id);
        $this->body = json_decode($adapter->getBody());
        $result = $this->body->result;
        return $this->setObject(Line::class, $result);
    }

    /**
     * @param null $filterModel
     */
    public function setFilterModel($filterModel)
    {
        $this->filterModel = $filterModel;
    }
}
