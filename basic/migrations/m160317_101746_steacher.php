<?php

use yii\db\Migration;

class m160317_101746_steacher extends Migration
{
    public function up()
    {
        $this->createTable('steacher', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(256),
            'lastName' => $this->string(512),
            'position' => $this->string(256),
            'email' => $this->string(256),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ]);

        $this->insert('steacher', [
            'firstName' => 'Test1',
            'lastName' => 'LTest1',
            'position' => 'senior teacher',
            'email' => 'test@test.test',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->dropTable('steacher');
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
