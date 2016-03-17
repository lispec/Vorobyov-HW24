<?php

use yii\db\Migration;

class m160317_092816_TStudent extends Migration
{
    public function up()
    {
        $this->createTable('tstudent', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(256),
            'lastName' => $this->string(512),
            'group' => $this->string(256),
            'email' => $this->string(256),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ]);

        $this->insert('tstudent', [
            'firstName' => 'Test1',
            'lastName' => 'LTest1',
            'group' => '519',
            'email' => 'test@test.test',
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);


    }

    public function down()
    {
        $this->dropTable('tstudent');
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
