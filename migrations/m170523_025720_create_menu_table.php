<?php

use yii\db\Migration;

class m170523_025720_create_menu_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'menu',
            [
                'id' => $this->primaryKey(),
                'family_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
            ]
        );
        $this->createIndex('idx-menu-family_id', 'menu', 'family_id');
        $this->addForeignKey('fk-menu-family_id', 'menu', 'family_id', 'family', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-menu-family_id', 'menu');
        $this->dropIndex('idx-menu-family_id', 'menu');
        $this->dropTable('menu');
    }
}
