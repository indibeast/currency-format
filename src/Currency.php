<?php
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