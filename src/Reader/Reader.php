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
namespace Currency\Reader;

use Currency\Exceptions\FileNotFoundException;

class Reader {
    /**
     * @var string
     */
    protected $path = '/../../resources/';
    /**
     * @var string
     */
    protected $ext = '.json';
    /**
     * @var string
     */
    protected $filename;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get Content as Array
     * @return mixed
     * @throws FileNotFoundException
     */
    public function getFileContent()
    {
        if($this->checkFileExists()) {
           return $this->jsonDecode();
        }

        throw new FileNotFoundException(sprintf('File %s not found in %s',$this->filename.$this->ext,realpath(__DIR__.$this->path)));
    }

    /**
     * Determine file exists
     * @return bool
     */
    protected function checkFileExists()
    {
         return file_exists($this->getResourcePath());
    }

    /**
     * Get File Path
     * @return string
     */
    protected function getResourcePath()
    {
        return __DIR__.$this->path.$this->filename.$this->ext;
    }

    /**
     * Get File Contents
     * @return string
     */
    protected function fileOpen()
    {
        return file_get_contents($this->getResourcePath());
    }

    /**
     * JSON Decode the content
     * @return mixed
     */
    protected function jsonDecode()
    {
        return json_decode($this->fileOpen(),true);
    }
} 