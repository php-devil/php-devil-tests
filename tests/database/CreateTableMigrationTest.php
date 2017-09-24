<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\database;
use PhpDevil\testing\mock\migrations\TestMigrationMock;
use PhpDevil\testing\tests\_helpers\WebAppTestCase;

class CreateTableMigrationTest extends WebAppTestCase
{
    private $schema;

    protected function setUp()
    {
        parent::setUp();
        $this->schema = (new TestMigrationMock())->up();
    }

    protected function tearDown()
    {
        $this->schema = null;
        parent::tearDown();
    }

    protected function column($name)
    {
        return $this->schema->getColumnDefinition($name);
    }


    public function testIntegerColumn()
    {
        $this->assertEquals('int(11) unsigned not null default \'1\'', $this->column('status'));
    }

    public function testPrimaryKeyColumn()
    {
        $this->assertEquals('int(11) unsigned not null auto_increment', $this->column('id'));
    }

    public function testIntegerPrimaryKey()
    {
        $this->assertEquals($this->column('pk'), $this->column('id'));
    }
}