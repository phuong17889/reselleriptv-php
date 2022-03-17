<?php

namespace ResellerIPTV\Abstracts;

use GuzzleHttp\Exception\ClientException;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use ResellerIPTV\Exceptions\EndpointException;
use ResellerIPTV\Exceptions\JsonException;
use ResellerIPTV\Exceptions\ResponseException;
use ResellerIPTV\Interfaces\AdapterInterface;

abstract class Adapter implements AdapterInterface
{
    protected $client;

    /**
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed|ResponseInterface
     * @throws EndpointException
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
     * @throws EndpointException|JsonException|ResponseException
     */
    public function post($uri, array $data = [], array $headers = [])
    {
        return $this->request('post', $uri, $data, $headers);
    }

    /**
     * @param $method
     * @param $uri
     * @param array $data
     * @param array $headers
     * @return mixed
     * @throws EndpointException
     * @throws JsonException
     * @throws ResponseException
     */
    public function request($method, $uri, array $data = [], array $headers = [])
    {
        if (!in_array($method, ['get', 'post'])) {
            throw new InvalidArgumentException('Request method must be get, post');
        }
        try {

            $response = $this->client->$method($uri, [
                'headers' => $headers,
                ($method === 'get' ? 'query' : 'form_params') => $data,
            ]);
        } catch (ClientException $e) {
            $content = $e->getResponse()->getBody()->getContents();
            throw new EndpointException($content);
        }

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
