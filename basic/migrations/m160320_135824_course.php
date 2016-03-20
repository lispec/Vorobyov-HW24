<?php

use yii\db\Migration;

class m160320_135824_course extends Migration
{
    public function up()
    {
//        Добавить миграцию для таблицы course , продумать поля для этой таблицы
        $this->createTable('course', [
            'id' => $this->primaryKey(),
            'courseName' => $this->string(512)->notNull(),
            'createdAt' => $this->dateTime()->notNull(),
            'updatedAt' => $this->dateTime()->notNull(),
        ]);

    }

    public function down()
    {
        $this->dropTable('course');
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
