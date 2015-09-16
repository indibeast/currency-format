<?php
namespace Currency\Test;

use Currency\Price;
use Currency\Reader\Reader;

class CurrencyTest extends \PHPUnit_Framework_TestCase {

    public function test_amount()
    {
        $currency = new Price(1000,'LKR');

        $this->assertEquals(1000,$currency->getAmount());
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

    public function test_currency_format()
    {
        $currency = new Price(3000,'USD',['show_decimal' => true,'seperator' => ',']);

        $this->assertEquals('$ 3,000.00',$currency->pretty());
    }

} 