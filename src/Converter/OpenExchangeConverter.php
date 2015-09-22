<?php
namespace Currency\Converter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class OpenExchangeConverter implements ConverterInterface {

    protected $baseurl = "https://openexchangerates.org/api/latest.json";

    protected $response;

    protected $rates;

    protected $appid;

    protected $status;

    protected $enterprice;


    public function __construct($appid,$enterprise = false)
    {
        $this->appid = $appid;
        $this->enterprice = (bool)$enterprise;

    }
    /**
     * @return float
     */
    public function getConversionRate($base,$to)
    {
        $this->connect($base);
        if(!$this->enterprice) {
            return $this->getConvertionRatio($this->getUSDBase($base),$this->getUSDBase($to));
        }

        return $this->getUSDBase($to);
    }

    public function getRates()
    {
        return $this->rates;
    }

    public function getResponse()
    {
        return $this->response;
    }

    protected function connect($base)
    {
        $client = new Client();
        $q['app_id'] = $this->appid;
        if ($this->enterprice) {
           $q['base'] = $base;
        }
        try {
            $res = $client->request('GET', $this->baseurl, [
                'query' => $q
            ]);
        } catch(ClientException $e)
        {
           throw new \Currency\Exceptions\ClientException($e->getResponse()->getStatusCode());
        }
        $this->response = json_decode($res->getBody(),true);
        $this->setRates();
    }

    protected function setRates()
    {
        $this->rates = $this->response['rates'];
    }

    protected function getUSDBase($cur)
    {
        return $this->rates[$cur];
    }

    protected function getConvertionRatio($base,$to)
    {
        return (float)$to/$base;
    }


}