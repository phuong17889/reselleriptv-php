<?php
/**
 * Created by FES VPN.
 * @project reselleriptv-php
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    3/15/2022
 * @time    11:00 AM
 * @version 1.0.0
 */

namespace ResellerIPTV\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface AdapterInterface
{
    /**
     * Sends a GET request.
     * Per Robustness Principle - not including the ability to send a body with a GET request (though possible in the
     * RFCs, it is never useful).
     *
     * @param string $uri
     * @param array $data
     * @param array $headers
     *
     * @return ResponseInterface
     */
    public function get($uri, array $data = [], array $headers = []);

    /**
     * Sends a POST request.
     * @param string $uri
     * @param array $data
     * @param array $headers
     *
     * @return ResponseInterface
     */
    public function post($uri, array $data = [], array $headers = []);
}
