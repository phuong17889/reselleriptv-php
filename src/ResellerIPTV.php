<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/14/2022
 * @time    4:58 PM
 */

namespace phuong17889\reselleriptv;

use phuong17889\reselleriptv\models\Admin;
use phuong17889\reselleriptv\models\User;

class ResellerIPTV
{

    const BASE_URL = 'https://api.reselleriptv.org/';

    const VERSION = 'v1';

    /**
     * @var User user of this admin
     */
    public $user;

    /**
     * @var Admin this admin
     */
    public $admin;

    private $url;
    private $api_key;
    private $user_key;

    private $is_admin = true;
    private $timeout = 10;
    private $response;
    private $error;

    /**
     * @return ResellerIPTV
     */
    public static function init($api_key, $user_key = null, $timeout = 10)
    {
        $resellerIPTV = new ResellerIPTV();
        $resellerIPTV->url = self::BASE_URL . self::VERSION;
        $resellerIPTV->api_key = $api_key;
        if ($user_key != null) {
            $resellerIPTV->is_admin = false;
            $resellerIPTV->user_key = $user_key;
        }
        $resellerIPTV->timeout = $timeout;
        return $resellerIPTV;
    }

    public function call($path, $params)
    {
        $header = [
            'iptv-api-key: Bearer ' . $this->api_key
        ];
        $url = $this->url . "/admin/" . $path;
        if (!$this->is_admin) {
            $header[] = 'iptv-user-key: Bearer' . $this->user_key;
            $url = $this->url . "/user/" . $path;
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => $this->timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $header,
        ]);
        $this->setError(curl_error($curl));
        $this->setResponse(curl_exec($curl));
        curl_close($curl);
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
