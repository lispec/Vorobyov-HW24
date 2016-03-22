<?php

namespace app\controllers;

use app\models\School;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;

class UserController extends Controller {
    public function actionEdit($id) {
        if($user = User::findOne($id)) {
            $user->scenario = 'edit';

            // 1 ЗАГРУЗКА ИЗОБРАЖЕНИЯ АВАТАРКИ (в место которое мы сами определяем)
            if($user->load(\Yii::$app->request->post()) && $user->save()) {
//                $file = UploadedFile::getInstance($user, 'avatar');
//                //$file = UploadedFile::getInstanceByName('jjj');
//                $file->saveAs(__DIR__ . '../dwdqwdwqdwqdqwd');
//                $user->avatar = 'qwdqwdqwdwqdwqd';
            }


            // 2 ЗАГРУЗКА ИЗОБРАЖЕНИЯ АВАТАРКИ (в место по умолчанию)
            if($user->load(\Yii::$app->request->post()) ) {
                $user->avatar = UploadedFile::getInstance($user, 'avatar');
                if($user->validate()) {

                }

                $user->save(false);
            }




            $schools = School::find()->asArray()->all();



            $array = ArrayHelper::map($schools, 'id', 'name');
            $array = [null => 'No school'] + $array;

            return $this->render('edit', [
                'model' => $user,
                'schools' => $array,
            ]);

        }
    }
}