<?php

namespace App\Services\Clients;

use Illuminate\Support\Facades\Http;

class Client
{
    private $baseUrl;
    private $apiKey;
    protected $client;
    protected $defaultQueryParameters;

    public function __construct()
    {
        $this->baseUrl = config('services.api.base_url');
        $this->apiKey =  config('services.api.key');

        $this->client = Http::baseUrl($this->baseUrl);
        $this->defaultQueryParameters = [
            'access_key' => $this->apiKey
        ];
    }

    public function request($method, $uri, $data = [])
    {
        $reqData = array_merge($this->defaultQueryParameters, $data);
        $method = strtolower($method);
  
        $request = $this->client->{$method}($uri, $reqData);

        return $request;
    }
}
