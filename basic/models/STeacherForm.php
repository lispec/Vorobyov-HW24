<?php

namespace app\models;

use yii\base\Model;

class STeacherForm extends Model
{

    public $firstNameTeacher;
    public $lastNameTeacher;
    public $position;
    public $emailTeacher;

    public function rules()
    {
        return [
            ['firstNameTeacher', 'required'],
            ['lastNameTeacher', 'required'],
            ['position', 'required'],
            ['emailTeacher', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstNameTeacher' => 'Ваше имя',
            'lastNameTeacher' => 'Ваша фамилия',
            'position' => 'Ваша должность',
            'emailTeacher' => 'Ваш email',
        ];

    }
}