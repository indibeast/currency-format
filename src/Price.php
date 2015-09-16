<?php
namespace Currency;

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
        $this->setCurency(new Currency((new Reader($this->code))->getFileContent()));

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
} 