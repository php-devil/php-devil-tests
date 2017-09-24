<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\data\query;
use PhpDevil\components\db\Connection;
use PhpDevil\testing\mock\data\ActiveRecordMock;
use PhpDevil\testing\tests\_helpers\WebAppTestCase;

class ActiveQueryTest extends WebAppTestCase
{
    private $_query = null;

    protected function setUp()
    {
        parent::setUp();
        $this->_query = ActiveRecordMock::find();
    }

    protected function tearDown()
    {
        $this->_query = null;
        parent::tearDown();
    }

    public function testDatabaseComponentIsVisible()
    {
        $this->assertInstanceOf(Connection::class, $this->_query->db());
    }
}