<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\mock\migrations;


class TestMigrationMock extends MigrationMock
{
    public function up()
    {
        return $this->createTable('test_table', [
            'id' => $this->integer(),
        ]);
    }

    public function down()
    {
        // TODO: Implement down() method.
    }
}