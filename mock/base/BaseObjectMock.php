<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\mock\base;
use PhpDevil\base\BaseObject;

/**
 * Class BaseObjectMock
 *
 * @property $someProperty
 * @property $fullAccessible
 * @property $readOnly
 * @property $writeOnly
 *
 * @package PhpDevil\testing\mock\base
 * @author Alexey Volkov <avolkov.webwizardry@gmail.com>
 */
class BaseObjectMock extends BaseObject
{
    public  $someProperty = null;

    private $fullAccessible = null;

    public function getFullAccessible()
    {
        return $this->fullAccessible;
    }

    public function setFullAccessible($value)
    {
        $this->fullAccessible = $value;
    }

    private $readOnly = null;

    public function getReadOnly()
    {
        return $this->readOnly;
    }

    private $writeOnly = null;

    public function setWriteOnly($value)
    {
        $this->writeOnly = $value;
    }
}