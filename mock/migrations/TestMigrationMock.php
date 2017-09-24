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
            'pk'     => $this->integerPrimaryKey(),
            'id'     => $this->integer(11)->notNull()->unsigned()->autoIncrement()->primary(),
            'name'   => $this->string()->notNull()->index(),
            'email'  => $this->string(60)->notNull()->unique(),
            'status' => $this->integer()->unsigned()->notNull()->defaultValue(1),
        ]);
    }

    public function down()
    {
        // TODO: Implement down() method.
    }
}