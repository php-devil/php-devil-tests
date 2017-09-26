<?php
/**
 * Class m_170926_131720_create_table_user_idenity
 * migrate to create/drop table user_idenity
 */
class m_170926_131720_create_table_user_idenity extends \PhpDevil\database\Migration
{
    /**
     * Creates table user_idenity
     * @return void
     */
    public function up()
    {
        $this->createTable('user_idenity', [
            'id'                   => $this->integerPrimaryKey(),
            'email'                => $this->string()->notNull()->unique(),
            'auth_key'             => $this->string(32),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status'               => $this->integer(2)->notNull()->defaultValue(10),
            'created_at'           => $this->integer()->notNull(),
            'updated_at'           => $this->integer()->notNull(),
        ]);
    }

    /**
     * Drops table user_idenity
     * @param bool $soft - adds 'IF EXISTS' when true
     * @return void
     */
    public function down($soft = false)
    {
        $this->dropTable('user_idenity', $soft);
    }
}