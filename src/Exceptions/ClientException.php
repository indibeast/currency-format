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
namespace Currency\Exceptions;

class ClientException extends \Exception{

    protected $errors = [
        401 => 'Client provided an invalid App ID or doesn\'t have permission to access requested route/feature',

    ];


    public function __construct($code)
    {
        if(isset($this->errors[$code])) {
            parent::__construct($this->errors[$code]);
        } else {
            parent::__construct('Something went wrong');
        }
    }
} 