<?php

namespace app\controllers;

use app\models\STeacherForm;
use yii\web\Controller;
use Yii;

class StudentController extends Controller
{
    public function actionAdd()
    {
        //Для обращения к БД
//        $steacher = STeacherForm::find()->where(['firstName' => 'Test1'])->one();
//        var_dump($steacher);
//        die;

        $teacher = new STeacherForm();        // создаем модель, а поля она из таблицы подтягивает


        if ($teacher->load(Yii::$app->request->post()) && $teacher->validate()) {
            $teacher->createdAt = date('Y-m-d H:i:s');
            $teacher->updatedAt = date('Y-m-d H:i:s');
            $teacher->save(false);     // сохранить без валидации

            return $this->render('entry-confirm', [
                'teacher' => $teacher
            ]);
        }
        return $this->render('add', [
            'teacher' => $teacher
        ]);
    }
}