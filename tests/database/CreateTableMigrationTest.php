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
    private $migration;

    protected function setUp()
    {
        parent::setUp();
        $this->migration = new TestMigrationMock();
    }

    protected function tearDown()
    {
        $this->migration = null;
        parent::tearDown();
    }

    public function testSqlQuery()
    {
        print_r($this->migration->up());
    }
}