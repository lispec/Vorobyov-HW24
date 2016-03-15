<?php

namespace app\controllers;


use app\models\STeacherForm;
use yii\web\Controller;
use Yii;

class StudentController extends Controller
{

    public function actionAdd()
    {
        $model = new STeacherForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', [
                'model' => $model
            ]);
        }
        return $this->render('add', [
            'model' => $model
        ]);
    }
}