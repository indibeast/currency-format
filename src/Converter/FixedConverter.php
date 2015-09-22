<?php
namespace Currency\Converter;

class FixedConverter implements ConverterInterface{

    /**
     * @return float
     */
    public function getConversionRate($code,$to)
    {
        return 1;
    }
}