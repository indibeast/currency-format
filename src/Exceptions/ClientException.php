<?php
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