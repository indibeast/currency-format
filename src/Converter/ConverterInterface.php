<?php
namespace Currency\Converter;

interface ConverterInterface {
    /**
     * @param $base  String Base Currency
     * @param $to    String Currency to convert
     * @return float Float Conversion Rate
     */
    public function getConversionRate($base,$to);
} 