<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class ApiException extends Exception
{
    public function report()
    {
        Log::error('API Exception: ' . $this->getMessage(), ['exception' => $this]);
    }

    public function render()
    {
        return response()->json(['error' => $this->getMessage()], $this->getCode());
    }
}
