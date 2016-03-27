<?php

namespace app\models;

use yii\db\ActiveRecord;


class School extends ActiveRecord
{
    public static function tableName()
    {
        return 'school';
    }

    public function rules()
    {
        return [
            ['name', 'required', 'on' => ['add', 'edit']],
            ['name', 'required', 'on' => ['add', 'edit',]],
            ['name', 'safe', 'on' => 'search']
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['schoolId' => 'id']);
    }

    public function beforeDelete()
    {
        User::updateAll(['schoolId' => null], ['schoolId' => $this->id]);

        return parent::beforeDelete();
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя'
        ];
    }

}