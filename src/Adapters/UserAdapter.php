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

class UserAdapter extends Adapter
{

    /**
     * @param AuthenticationInterface $apiKey
     * @param AuthenticationInterface|null $userKey
     * @param $baseURI
     */
    public function __construct(AuthenticationInterface $apiKey, AuthenticationInterface $userKey = null, $baseURI = null)
    {
        if ($baseURI === null) {
            $baseURI = 'https://api.reselleriptv.org/v1/user/';
        }

        $headers = array_merge($apiKey->getHeaders(), $userKey->getHeaders());

        $this->client = new Client([
            'base_uri' => $baseURI,
            'headers' => $headers,
            'Accept' => 'application/json'
        ]);
    }
}
