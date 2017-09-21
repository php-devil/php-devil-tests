<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\web;
use PhpDevil\Devil;
use PhpDevil\testing\tests\_helpers\WebAppTestCase;
use PhpDevil\web\Application;

class ApplicationTest extends WebAppTestCase
{
    public function testAppCreated()
    {
        print_r($this->app);
        print_r(Devil::container());
        $this->assertInstanceOf(Application::class, $this->app);
    }
}