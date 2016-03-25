<?php

namespace app\controllers;

use app\models\School;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SchoolController extends Controller
{
    public function actionAdd()
    {
        $model = new School([
            'scenario' => 'add',
        ]);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/school/list']);
        }

        return $this->render('add', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        if ($school = School::findOne($id)) {
            $school->delete();
        }

        //School::deleteAll(['id' => $id]);

        return $this->redirect(['/school/list']);
    }

    public function actionEdit($id)
    {

        if ($school = School::findOne($id)) {

            $school->scenario = 'edit';

            if ($school->load(\Yii::$app->request->post()) && $school->save()) {
                return $this->redirect(['/school/list']);
            }

            return $this->render('edit', [
                'model' => $school,
            ]);
        } else {
            throw new NotFoundHttpException('School not exists.');
        }


    }

    public function actionList()
    {

        $query = School::find();

        $filterModel = new School([
            'scenario' => 'search'
        ]);

        if ($filterModel->load(\Yii::$app->request->get()) && $filterModel->validate()) {
            $query->andWhere(['like', 'name', $filterModel->name]);
        }

        $provider = new ActiveDataProvider([
//            'query' => School::find(),
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('list', [
            'provider' => $provider,
            'filterModel' => $filterModel,

        ]);

    }
}