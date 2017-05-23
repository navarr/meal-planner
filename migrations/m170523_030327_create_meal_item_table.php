<?php

use yii\db\Migration;

/**
 * Handles the creation of table `meal_item`.
 */
class m170523_030327_create_meal_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            'meal_item',
            [
                'id' => $this->primaryKey(),
                'meal_id' => $this->integer()->notNull(),
                'menu_id' => $this->integer()->notNull(),
            ]
        );
        $this->createIndex('idx-meal_item-meal_id', 'meal_item', 'meal_id');
        $this->createIndex('idx-meal_item-menu_id', 'meal_item', 'menu_id');
        $this->createIndex('idx-meal_item-meal_id-menu_id', 'meal_item', ['meal_id', 'menu_id'], true);
        $this->addForeignKey('fk-meal_item-meal_id', 'meal_item', 'meal_id', 'meal', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk-meal_item-menu_id', 'meal_item', 'menu_id', 'menu', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-meal_item-menu_id', 'meal_item');
        $this->dropForeignKey('fk-meal_item-meal_id', 'meal_item');
        $this->dropIndex('idx-meal_item-meal_id-menu_id', 'meal_item');
        $this->dropIndex('idx-meal_item-menu_id', 'meal_item');
        $this->dropIndex('idx-meal_item-meal_id', 'meal_item');
        $this->dropTable('meal_item');
    }
}
