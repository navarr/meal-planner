<?php

use yii\db\Migration;

class m170429_180630_create_day_view extends Migration
{
    public function up()
    {
        $this->execute("CREATE VIEW `day` AS SELECT DISTINCT `date` FROM `day_item`");
    }

    public function down()
    {
        $this->execute("DROP VIEW `day`");
    }
}
