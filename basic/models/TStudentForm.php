<?php

namespace app\models;

use yii\base\Model;

class TStudentForm extends Model
{
    public $firstNameStudent;
    public $lastNameStudent;
    public $group;
    public $emailStudent;

    public function rules()
    {
        return [
            ['firstNameStudent', 'required'],
            ['lastNameStudent', 'required'],
            ['group', 'required'],
            ['emailStudent', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstNameStudent' => 'Ваше имя',
            'lastNameStudent' => 'Ваша фамилия',
            'group' => 'Ваша группа',
            'emailStudent' => 'Ваш email',
        ];
    }


}