<?php

use yii\db\Migration;

class m170524_013616_account_table_add_authkey extends Migration
{
    public function up()
    {
        $this->addColumn('account', 'authkey', $this->string());
    }

    public function down()
    {
        $this->dropColumn('account', 'authkey');
    }
}
