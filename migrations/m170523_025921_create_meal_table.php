<?php

use yii\db\Migration;

/**
 * Handles the creation of table `meal`.
 */
class m170523_025921_create_meal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
            'meal',
            [
                'id' => $this->primaryKey(),
                'date' => $this->date()->notNull(),
                'family_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
            ]
        );
        $this->createIndex('idx-meal-family_id', 'meal', 'family_id');
        $this->createIndex('idx-meal-date', 'meal', 'date');
        $this->createIndex('idx-meal-date-name', 'meal', ['date', 'name'], true);
        $this->addForeignKey('fk-meal-family_id', 'meal', 'family_id', 'family', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-meal-family_id', 'meal');
        $this->dropIndex('idx-meal-date-name', 'meal');
        $this->dropIndex('idx-meal-date', 'meal');
        $this->dropIndex('idx-meal-family_id', 'meal');
        $this->dropTable('meal');
    }
}
