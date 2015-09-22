<?php
/**
 * This file is part of the indibeast/currency-format library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Indika Gunasekara <indigun89@gmail.com>
 * @license http://opensource.org/licenses/MIT MIT
 * @link https://packagist.org/packages/indibeast/currency-formatter Packagist
 * @link https://github.com/indibeast/currency-format GitHub
 */
namespace Currency\Converter;

interface ConverterInterface {
    /**
     * @param $base  String Base Currency
     * @param $to    String Currency to convert
     * @return float Float Conversion Rate
     */
    public function getConversionRate($base,$to);
} 