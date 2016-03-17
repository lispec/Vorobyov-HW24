<?php

namespace app\controllers;


use app\models\TStudentForm;
use yii\web\Controller;
use Yii;

class TeacherController extends Controller
{
    public function actionAdd()
    {
        $student = new TStudentForm();

        if ($student->load(Yii::$app->request->post()) && $student->validate()) {

            $student->createdAt = date('Y-m-d H:i:s');
            $student->updatedAt = date('Y-m-d H:i:s');
            $student->save(false);

            return $this->render('entry-confirm', [
                'student' => $student
            ]);

        } else {
            return $this->render('add', [
                'student' => $student
            ]);
        }
    }
}