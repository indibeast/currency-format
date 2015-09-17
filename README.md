# Currency Formatter
[![Build Status](https://travis-ci.org/indibeast/currency-format.svg?branch=master)](https://travis-ci.org/indibeast/currency-format)
[![Coverage Status](https://coveralls.io/repos/indibeast/currency-format/badge.svg?branch=master&service=github)](https://coveralls.io/github/indibeast/currency-format?branch=master)
[![Total Downloads](https://poser.pugx.org/indibeast/currency-formatter/downloads)](https://packagist.org/packages/indibeast/currency-formatter)
[![Latest Unstable Version](https://poser.pugx.org/indibeast/currency-formatter/v/unstable)](https://packagist.org/packages/indibeast/currency-formatter)
[![License](http://img.shields.io/:license-mit-blue.svg)](http://doge.mit-license.org)
## Minimum Requirements ##

- PHP 5.5+

Installation
------------

Install using composer:

```bash
composer require indibeast/currency-formatter
```
## Example
```php
 $price = new Currency\Price(3000,'LKR');
 $price->pretty();// Rs 3,000.00
```
 You can pass the options as an array to the third parameter.
 ```php
  $price = new Currency\Price(3000,'LKR',['show_decimal' => false,'seperator' => ',']);
  $price->pretty();// Rs 3,000
 ```
## To Do
- Add currency converter

## License

The MIT License (MIT). Please see [License File](https://github.com/indibeast/currency-format/blob/master/LICENSE) for more information.
