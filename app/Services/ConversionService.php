<?php

namespace App\Services;

use App\Http\Requests\ConversionRequest;
use App\Repositories\Conversions\ConversionRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConversionService
{
    private $conversionRepository;

    public function __construct(ConversionRepository $conversionRepository)
    {
        $this->conversionRepository = $conversionRepository;
    }

    public function create($data)
    {
        try {
            DB::beginTransaction();

            $this->conversionRepository->create($data->toArray());

            DB::commit();

            return response()->json(['success' => 'Success'], 200);
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Error creating model: ' . $ex->getMessage());
            
            return response()->json(['error' => 'An error occurred while creating the model'], 400);
        };


    }
}
