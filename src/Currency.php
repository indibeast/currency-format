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

class Currency {

    /**
     * @var string
     */
    protected $sign;
    /**
     * @var string
     */
    protected $code;
    /**
     * @var string
     */
    protected $title;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $index => $value) {
            if (property_exists($this, $index)) {
                $this->{$index} = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
} 