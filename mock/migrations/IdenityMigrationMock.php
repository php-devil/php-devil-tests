<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\mock\migrations;
use PhpDevil\database\Migration;

class IdenityMigrationMock extends Migration
{
    public function up()
    {
        $this->createTable('phpunit_idenity', [
            'id'            => $this->integerPrimaryKey(),
            'login'         => $this->string()->notNull()->unique(),
            'name'          => $this->string()->notNull()->index(),
            'password_hash' => $this->string()->notNull()
        ]);
    }

    public function down($soft = false)
    {
        $this->dropTable('phpunit_idenity', $soft);
    }
}