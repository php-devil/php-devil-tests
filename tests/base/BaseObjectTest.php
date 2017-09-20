<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\tests\base;
use PhpDevil\base\object\BadCallException;
use PhpDevil\base\object\UnknownPropertyException;
use PhpDevil\testing\mock\base\BaseObjectMock;
use PHPUnit\Framework\TestCase;

class BaseObjectTest extends TestCase
{
    /** @var BaseObjectMock */
    private $obj = null;

    protected function setUp()
    {
        ensureKernelConfigured();
        $this->obj = new BaseObjectMock([
            'writeOnly' => 365
        ]);
    }

    protected function tearDown()
    {
        $this->obj = null;
        parent::tearDown();
    }

    public function testPropertyIsSetsNormally()
    {
        $value = rand(1, 32000);
        $this->obj->someProperty = $value;
        $this->assertEquals($value, $this->obj->someProperty);
    }

    public function testFullAccessibleSetsNormally()
    {
        $value = rand(1, 32000);
        $this->obj->fullAccessible = $value;
        $this->assertEquals($value, $this->obj->fullAccessible);
    }

    public function testUnknownPropertyExceptionOnWrite()
    {
        $this->expectException(UnknownPropertyException::class);
        $this->obj->unknown = 0;
    }

    public function testUnknownPropertyExceptionOnRead()
    {
        $this->expectException(UnknownPropertyException::class);
        $a = $this->obj->unknown;
    }

    public function testExceptionOnReadingWriteOnly()
    {
        $this->expectException(BadCallException::class);
        $a = $this->obj->writeOnly;
    }

    public function testExceptionOnWritingReadOnly()
    {
        $this->expectException(BadCallException::class);
        $this->obj->readOnly = 0;
    }

    public function testCanGetPropertyWhenTrue()
    {
        $this->assertTrue(
            $this->obj->canGetProperty('fullAccessible')
            && $this->obj->canGetProperty('readOnly')
        );
    }

    public function testCanGetPropertyWhenFalse()
    {
        $this->assertFalse($this->obj->canGetProperty('writeOnly'));
    }

    public function testCanGetPropertyWhenUnknown()
    {
        $this->assertFalse($this->obj->canGetProperty('unknown', true));
    }

    public function testCanSetPropertyWhenTrue()
    {
        $this->assertTrue(
            $this->obj->canSetProperty('fullAccessible')
            && $this->obj->canSetProperty('writeOnly')
        );
    }

    public function testCanSetPropertyWhenFalse()
    {
        $this->assertFalse($this->obj->canSetProperty('readOnly'));
    }

    public function testCanSetPropertyWhenUnknown()
    {
        $this->assertFalse($this->obj->canSetProperty('unknown', true));
    }
}