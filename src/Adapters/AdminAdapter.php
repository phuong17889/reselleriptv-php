<?php
/**
 * User: junade
 * Date: 13/01/2017
 * Time: 18:26
 */

namespace ResellerIPTV\Adapters;

use GuzzleHttp\Client;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use ResellerIPTV\Exceptions\JsonException;
use ResellerIPTV\Exceptions\ResponseException;
use ResellerIPTV\Interfaces\AdapterInterface;
use ResellerIPTV\Interfaces\AuthenticationInterface;

class AdminAdapter implements AdapterInterface
{
    private $client;

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

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed|ResponseInterface
     * @throws JsonException
     * @throws ResponseException
     */
    public function get($uri, array $data = [], array $headers = [])
    {
        return $this->request('get', $uri, $data, $headers);
    }

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed|ResponseInterface
     * @throws JsonException
     * @throws ResponseException
     */
    public function post($uri, array $data = [], array $headers = [])
    {
        return $this->request('post', $uri, $data, $headers);
    }

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed|ResponseInterface
     * @throws JsonException
     * @throws ResponseException
     */
    public function put($uri, array $data = [], array $headers = [])
    {
        return $this->request('put', $uri, $data, $headers);
    }

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed|ResponseInterface
     * @throws JsonException
     * @throws ResponseException
     */
    public function patch($uri, array $data = [], array $headers = [])
    {
        return $this->request('patch', $uri, $data, $headers);
    }

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed|ResponseInterface
     * @throws JsonException
     * @throws ResponseException
     */
    public function delete($uri, array $data = [], array $headers = [])
    {
        return $this->request('delete', $uri, $data, $headers);
    }

    /**
     * @param $method
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed
     * @throws JsonException
     * @throws ResponseException
     */
    public function request($method, $uri, array $data = [], array $headers = [])
    {
        if (!in_array($method, ['get', 'post', 'put', 'patch', 'delete'])) {
            throw new InvalidArgumentException('Request method must be get, post, put, patch, or delete');
        }

        $response = $this->client->$method($uri, [
            'headers' => $headers,
            ($method === 'get' ? 'query' : 'json') => $data,
        ]);

        $this->checkError($response);

        return $response;
    }

    /**
     * @param ResponseInterface $response
     * @return void
     * @throws JsonException
     * @throws ResponseException
     */
    private function checkError(ResponseInterface $response)
    {
        $json = json_decode($response->getBody());

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException();
        }

        if (isset($json->errors) && count($json->errors) >= 1) {
            throw new ResponseException($json->errors[0]->message, $json->errors[0]->code);
        }

        if (isset($json->success) && !$json->success) {
            throw new ResponseException('Request was unsuccessful.');
        }
    }
}
