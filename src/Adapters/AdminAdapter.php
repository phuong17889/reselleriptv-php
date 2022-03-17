<?php
/**
 * User: junade
 * Date: 13/01/2017
 * Time: 18:26
 */

namespace ResellerIPTV\Adapters;

use GuzzleHttp\Client;
use ResellerIPTV\Abstracts\Adapter;
use ResellerIPTV\Interfaces\AuthenticationInterface;

class AdminAdapter extends Adapter
{

    /**
     * @param AuthenticationInterface $apiKey
     * @param $baseURI
     */
    public function __construct(AuthenticationInterface $apiKey, $baseURI = null)
    {
        if ($baseURI === null) {
            $baseURI = 'https://api.reselleriptv.org/v1/admin/';
        }

        $headers = $apiKey->getHeaders();

        $this->client = new Client([
            'base_uri' => $baseURI,
            'headers' => $headers,
            'Accept' => 'application/json'
        ]);
    }
}
