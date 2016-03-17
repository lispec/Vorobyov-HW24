<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

//class STeacherForm extends Model


class STeacherForm extends ActiveRecord
{

    public static function tableName(){
        return 'steacher';
    }

    public function rules()
    {
        return [
            ['firstName', 'required'],
            ['lastName', 'required'],
            ['position', 'required'],
            ['email', 'email'],
            ['email', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstName' => 'Ваше имя',
            'lastName' => 'Ваша фамилия',
            'position' => 'Ваша должность',
            'email' => 'Ваш email',
        ];

    }
}