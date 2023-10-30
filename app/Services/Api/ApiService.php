<?php

namespace App\Services\Api;

use App\DTO\ResponseData;
use App\Exceptions\ApiException;
use App\Services\Clients\Client;
use Illuminate\Http\Client\RequestException;

class ApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    public function fetchData($method, $endpoint, $requestData=[])
    {
        try {
            $response = $this->sendRequest($method, $endpoint, $requestData);
            $processedData = $this->processResponse($response);

            return $processedData;
        } catch (RequestException $ex) {
            throw new ApiException('Request Error: ' . $ex->getMessage());
        } catch (\Throwable $ex) {
            throw new ApiException('Unexpected Error: ' . $ex->getMessage());
        }
    }

    protected function sendRequest($method, $endpoint, $requestData=[])
    {
        $response = $this->client->request($method, $endpoint, $requestData);

        return $response;
    }

    protected function processResponse($response)
    {
       if ($response->successful()) {
            $responseData = new ResponseData($response->json());
        
            return $responseData;
        } 

        throw new ApiException('API Error: ' . $response->status() . ' - ' . $response->body());
    }
}
