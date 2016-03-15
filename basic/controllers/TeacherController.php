<?php

namespace app\controllers;


use app\models\TStudentForm;
use yii\web\Controller;
use Yii;

class TeacherController extends Controller
{
    public function actionAdd()
    {
        $model = new TStudentForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('add', [
                'model' => $model
            ]);
        }
    }
}