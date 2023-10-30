<?php

namespace App\Repositories\Conversions;

use App\Models\Conversion;
use App\Repositories\Conversions\Interfaces\ConversionRepositoryInterface;

class ConversionRepository implements ConversionRepositoryInterface
{
    public function create(array $data)
    {
        return Conversion::create($data);
    }
}
