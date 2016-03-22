<?php

use yii\db\Migration;

class m160322_142224_school extends Migration
{
    public function up()
    {
        $this->createTable('school', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);

        $this->addColumn('user', 'schoolId', $this->integer());

        $this->addForeignKey('fkUserSchool', 'user', 'schoolId', 'school', 'id', 'CASCADE', 'CASCADE');

        $this->insert('school', [
            'name' => 'SPALAH',
        ]);
    }

    public function down()
    {
        $this->dropForeignKey('fkUserSchool', 'user');
        $this->dropColumn('user', 'schoolId');
        $this->dropTable('school');
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
