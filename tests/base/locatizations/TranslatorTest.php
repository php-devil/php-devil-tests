<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\base\locatizations;
use PhpDevil\Devil;
use PHPUnit\Framework\TestCase;

class TranslatorTest extends TestCase
{
    protected function setUp()
    {
        ensureKernelConfigured();
        Devil::setInterfaceLanguage('en');
    }

    public function testExceptionMessage()
    {
        $this->assertEquals(
            'The alias of the path unknown must begin with a symbol \'@\'',
            Devil::t('@core{...}exceptions', 'Псевдоним пути {alias} должен начинаться с символа \'@\'', ['alias' => 'unknown'])
        );
    }
}