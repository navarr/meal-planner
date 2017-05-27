<?php

use yii\db\Migration;

class m170523_025144_create_account_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'account',
            [
                'id' => $this->primaryKey(),
                'family_id' => $this->integer()->null(),
                'name' => $this->string()->notNull(),
                'email' => $this->string()->notNull()->unique(),
                'password' => $this->string()->notNull()
            ]
        );
        $this->createIndex('idx-account-family_id', 'account', 'family_id');
        $this->addForeignKey('fk-account-family_id', 'account', 'family_id', 'family', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-account-family_id', 'account');
        $this->dropIndex('idx-account-family_id', 'account');
        $this->dropTable('account');
    }
}
