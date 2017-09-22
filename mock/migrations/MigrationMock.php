<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\mock\migrations;
use PhpDevil\database\Migration;

abstract class MigrationMock extends Migration
{
    public function createTable($tableName, array $definitions, $options = '')
    {
        return $this->getCreateTableQuery($tableName, $definitions, $options);
    }
}