<?php

//------------------ миграция Миши--------------------

use yii\db\Migration;

class m160320_135824_course extends Migration
{
    public function up()
    {
        $this->createTable('course', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
        ]);

        $this->createTable('userCourse', [
            'userId' => $this->integer(),
            'courseId' => $this->integer(),
        ]);

        $this->addPrimaryKey('pkUserCourse', 'userCourse', ['userId', 'courseId']);
        $this->addForeignKey('fkUserCourseUser', 'userCourse', 'userId', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fkUserCourseCourse', 'userCourse', 'courseId', 'course', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fkUserCourseCourse', 'userCourse');
        $this->dropForeignKey('fkUserCourseUser', 'userCourse');
        $this->dropTable('userCourse');
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


//-------------------мой вариант--------------------

//use yii\db\Migration;
//
//class m160320_135824_course extends Migration
//{
//    public function up()
//    {
////        Добавить миграцию для таблицы course , продумать поля для этой таблицы
//        $this->createTable('course', [
//            'id' => $this->primaryKey(),
//            'courseName' => $this->string(512)->notNull(),
//            'createdAt' => $this->dateTime()->notNull(),
//            'updatedAt' => $this->dateTime()->notNull(),
//        ]);
//
//    }
//
//    public function down()
//    {
//        $this->dropTable('course');
//    }
//
//    /*
//    // Use safeUp/safeDown to run migration code within a transaction
//    public function safeUp()
//    {
//    }
//
//    public function safeDown()
//    {
//    }
//    */
//}
