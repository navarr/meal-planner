<?php

use yii\db\Migration;

/**
 * Handles the creation of table `meal`.
 */
class m170429_173028_create_meal_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('meal_item', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('meal_item');
    }
}
