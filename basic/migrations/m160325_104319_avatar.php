<?php

use yii\db\Migration;

class m160325_104319_avatar extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'avatar', $this->string(256));
    }

    public function down()
    {
        $this->dropColumn('user', 'avatar');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
