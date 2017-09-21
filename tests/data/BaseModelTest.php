<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\data;
use PhpDevil\data\BaseModelException;
use PhpDevil\testing\mock\data\BaseModelMock;
use PhpDevil\testing\tests\_helpers\WebAppTestCase;

class BaseModelTest extends WebAppTestCase
{
    public function testNewModelThrowsException()
    {
        $this->expectException(BaseModelException::class);
        new BaseModelMock('test', $this);
    }

    public function testModelDump()
    {
        print_r(BaseModelMock::model());
    }
}