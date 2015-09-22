<?php
namespace Currency\Test;

use Currency\Converter\FixedConverter;
use Currency\Converter\OpenExchangeConverter;
use Currency\Price;
use Currency\Reader\Reader;
use Mockery as m;

class CurrencyTest extends \PHPUnit_Framework_TestCase {

    public function test_amount()
    {
        $currency = new Price(1000,'LKR');

        $this->assertEquals(1000,$currency->getAmount());
        $this->assertEquals('LKR',$currency->getCode());
    }

    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }
    public function test_currency_options()
    {
        $currency = new Price(2000,'LKR',['show_decimal' => false]);

        $this->assertArrayHasKey('show_decimal',$currency->getOptions());
    }

    public function test_file_reader()
    {
        $filereader = new Reader('LKR');

        $this->assertArrayHasKey('sign',$filereader->getFileContent());
    }

    public function test_currency_object()
    {
        $currency = new Price(50.09,'LKR');
        $currencyobj = $currency->getCurrency();
        $this->assertInstanceOf('\Currency\Currency',$currencyobj);
        $this->assertEquals('Rs.',$currencyobj->getSign());
        $this->assertEquals('LKR',$currencyobj->getCode());
        $this->assertEquals('Sri Lankan Rupee',$currencyobj->getTitle());
    }

    public function test_currency_format()
    {
        $currency = new Price(3000.09,'USD',['show_decimal' => true,'seperator' => ',']);

        $this->assertEquals('$ 3,000.09',$currency->pretty());
    }

    public function test_currency_convert()
    {
        $currency = new Price(1,'USD');
        $currency->setConverter(new FixedConverter());
        $this->assertEquals('Rs. 1.00',$currency->convert('LKR'));
    }

    

} 