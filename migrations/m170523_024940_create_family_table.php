<?php

use yii\db\Migration;

class m170523_024940_create_family_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'family',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
            ]
        );
    }

    public function down()
    {
        $this->dropTable('family');
    }
}
