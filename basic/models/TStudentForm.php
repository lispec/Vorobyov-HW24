<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

//class TStudentForm extends Model


class TStudentForm extends ActiveRecord         // ActiveRecord extends Model
{

    public static function tableName(){
        return 'tstudent';
    }

    public function rules()
    {
        return [
            ['firstName', 'required'],
            ['lastName', 'required'],
            ['group', 'required'],
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstName' => 'Ваше имя',
            'lastName' => 'Ваша фамилия',
            'group' => 'Ваша группа',
            'email' => 'Ваш email',
        ];
    }
}