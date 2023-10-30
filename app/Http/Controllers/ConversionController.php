<?php

namespace App\Http\Controllers;

use App\DTO\ConversionData;
use App\Http\Requests\ConversionRequest;
use App\Services\Api\ApiService;
use App\Services\ConversionService;
use Exception;
use Illuminate\Support\Facades\Log;

class ConversionController extends Controller
{
    protected $apiService;
    protected $conversionService;

    public function __construct(
        ApiService $apiService,
        ConversionService $conversionService
    ) {
        $this->apiService = $apiService;
        $this->conversionService = $conversionService;
    }
    public function convert(ConversionRequest $request)
    {
        $method = 'get';
        $endpoint = '/convert';
        $payload = $request->validated();

        $apiData = $this->apiService->fetchData($method, $endpoint, $payload);

        if (!$apiData->success) {
            return response()->json(['message' => $apiData->error['type']], $apiData->error['code']);
        }

        try {
            $data = new ConversionData();
            $data->setSourceCurrency($apiData->query['from']);
            $data->setTargetCurrency($apiData->query['to']);
            $data->setValue($apiData->query['amount']);
            $data->setConvertedValue($apiData->result);
    
            $response = $this->conversionService->create($data);

            if ($response->getStatusCode() === 200) {
                return response()->json(['success' => 'Conversion created successfully'], 200);
            } else {
                return response()->json(['error' => 'An error occurred while creating the conversion'], 400);
            }
    
        } catch (Exception $ex) {
            Log::error('Unexpected error: ' . $ex->getMessage());
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
       
    }
}
