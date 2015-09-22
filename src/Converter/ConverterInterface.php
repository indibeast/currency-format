<?php
namespace Currency\Converter;

interface ConverterInterface {
    /**
     * @return float
     */
    public function getConversionRate($base,$to);
} 