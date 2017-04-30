<?php

use yii\db\Migration;

/**
 * Handles the creation of table `day_item_connector`.
 */
class m170429_173708_create_day_item_connector_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            'day_item',
            [
                'date' => $this->date(),
                'type' => $this->string(),
                'meal_item' => $this->integer()->notNull(),
            ]
        );
        $this->createIndex('day_item_idx_date_type', 'day_item', ['date', 'type']);
        $this->addForeignKey(
            'day_item-meal_item_fk_meal_item-id',
            'day_item',
            'meal_item',
            'meal_item',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('day_item');
    }
}
