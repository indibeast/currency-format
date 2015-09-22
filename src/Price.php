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
namespace Currency;

use Currency\Converter\ConverterInterface;
use Currency\Reader\Reader;

class Price {
    /**
     * @var float
     */
    protected $amount;
    /**
     * @var string
     */
    protected $code;
    /**
     * @var \Currency\Currency;
     */
    protected $currency;
    /**
     * @var \Currency\Converter\ConverterInterface
     */
    protected $converter;

    protected $options = [
      'show_decimal' => true,
      'seperator'    => ','
    ];

    /**
     * @param float  $amount
     * @param string $code
     * @param array  $options
     */
    public function __construct($amount,$code,$options = [])
    {
        $this->amount = $amount;
        $this->code   = $code;
        $this->options = array_merge($this->options,$options);
        $this->setCurency(new Currency((new Reader($this->code))->getFileContent()));
    }

    /**
     * Get amount
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get ISO currency code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get Options
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get currency object
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Return the formatted string
     * @return string
     * @throws Exceptions\FileNotFoundException
     */
    public function pretty()
    {

        return $this->format();
    }

    /**
     * Set the currency
     * @param $currency
     */
    protected function setCurency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * Return the amount with currency type
     * @return string
     */
    protected function format()
    {
        return $this->currency->getSign().' '.$this->formatAmount();
    }

    /**
     * Return the formatted amount
     * @return string
     */
    protected function formatAmount()
    {
       return number_format($this->amount,$this->noOfDecimals(),'.',$this->getSeperator());
    }

    /**
     * Return the no of decimals
     * @return int
     */
    protected function noOfDecimals()
    {
        if ($this->options['show_decimal']) {

            return 2;
        }

        return 0;
    }

    /**
     * Return the thousand seperator
     * @return mixed
     */
    protected function getSeperator()
    {
        return $this->options['seperator'];
    }

    public function setConverter(ConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    public function convert($currency)
    {
       return(new self(($this->amount * $this->converter->getConversionRate($this->code,$currency)),$currency))->pretty();

    }
} 