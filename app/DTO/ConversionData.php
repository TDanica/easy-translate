<?php

namespace App\DTO;

class ConversionData
{
    protected $sourceCurrency;
    protected $targetCurrency;
    protected $value;
    protected $convertedValue;

    public function setSourceCurrency($sourceCurrency)
    {
        $this->sourceCurrency = $sourceCurrency;
    }

    public function setTargetCurrency($targetCurrency)
    {
        $this->targetCurrency = $targetCurrency;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setConvertedValue($convertedValue)
    {
        $this->convertedValue = $convertedValue;
    }

    public function getSourceCurrency()
    {
        return $this->sourceCurrency;
    }

    public function getTargetCurrency()
    {
        return $this->targetCurrency;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getConvertedValue()
    {
        return $this->convertedValue;
    }

    public function toArray()
    {
        return [
            'source_currency' => $this->sourceCurrency,
            'target_currency' => $this->targetCurrency,
            'value' => $this->value,
            'converted_value' => $this->convertedValue
        ];
    }
}
