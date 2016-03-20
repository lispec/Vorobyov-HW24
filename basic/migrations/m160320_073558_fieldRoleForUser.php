<?php

use yii\db\Migration;

class m160320_073558_fieldRoleForUser extends Migration
{
    public function up()
    {
//        Добавить миграцию которая добавляет поле role к таблице user,
//        поле типа ENUM , с вариантами 'user', 'teacher', 'student', 'admin'
//        'role' => 'ENUM(`yes`, `no`) NOT NULL DEFAULT `yes`',
//        'status' => "enum('" . active . "','" . inactive . "') NOT NULL DEFAULT '" . active . "'",
//        $this->addColumn('user', 'authKey', $this->string(256));
//        'id' => $this->primaryKey(),
        $this->addColumn('user', 'role', "ENUM('user', 'teacher', 'student', 'admin') NOT NULL DEFAULT 'user'");
    }

    public function down()
    {
        $this->dropColumn('user', 'role');
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
