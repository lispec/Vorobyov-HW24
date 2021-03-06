<?php

namespace app\controllers;

use app\models\School;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\UploadedFile;

class UserController extends Controller
{
    public function actionEdit($id)
    {
        if ($user = User::findOne($id)) {
            $user->scenario = 'edit';

            // 1 ЗАГРУЗКА ИЗОБРАЖЕНИЯ АВАТАРКИ (в место которое мы сами определяем)
//            if ($user->load(\Yii::$app->request->post()) && $user->save()) {
//                $file = UploadedFile::getInstance($user, 'avatar');
//                //$file = UploadedFile::getInstanceByName('jjj');
//                $file->saveAs(__DIR__ . '../dwdqwdwqdwqdqwd');
//                $user->avatar = 'qwdqwdqwdwqdwqd';
//                die;

//            }


            // 2 ЗАГРУЗКА ИЗОБРАЖЕНИЯ АВАТАРКИ (в место по умолчанию)
            if ($user->load(\Yii::$app->request->post()) && $user->validate()) {     // загрузили из поста


                if (isset(UploadedFile::getInstance($user, 'avatar')->name)) {
                    $user->avatar = UploadedFile::getInstance($user, 'avatar')->name;  // добавили аватар в объект

                    $file = UploadedFile::getInstance($user, 'avatar');
                    $file->saveAs(__DIR__ . '/../web/image/' . $user->avatar);

                    var_dump($file);
                }

//                var_dump($user->avatar->tempName);
//                echo "<img src='http://htmlbook.ru/themes/hb/img/logo.png'>";
//                echo "<img src='C:\Users\MARISHA\Pictures\LifeFrame\1.jpg'>";
//                <img src="images/girl.png"
//
//                var_dump($user);
//                die;

                if ($user->validate()) {
                    $user->save(false);
                }

                return $this->redirect('/user/list/');
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


    public function actionList()
    {

//        $provider = new ActiveDataProvider([
//            'query' => User::find(),
//            'pagination' => [
//                'pageSize' => 5,
//            ],
//        ]);
//
//        return $this->render('list', [
//            'provider' => $provider,
//        ]);


        //4. Сделать поиск по пользователям, по firstName, email, lastName

        // 1) создаем переменную с информацией из таблице
        $query = User::find();

        // 2) создаем модель
        $filterModel = new User([
            'scenario' => 'search'
        ]);

        // 3) обработка формы
        if ($filterModel->load(\Yii::$app->request->get()) && $filterModel->validate()) {
            if (!empty($filterModel->firstName)) {
                $query->andWhere(['like', 'firstName', $filterModel->firstName]);
            } elseif (!empty($filterModel->lastName)) {
                $query->andWhere(['like', 'lastName', $filterModel->lastName]);
            } elseif (!empty($filterModel->email)) {
                $query->andWhere(['like', 'email', $filterModel->email]);
            }
        }

        // 4) объект ActiveDataProvider
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        // 5) render
        return $this->render('list', [
            'provider' => $provider,
            'filterModel' => $filterModel,
        ]);
    }


    public function actionDelete($id)
    {

        if ($user = User::findOne($id)) {
            $user->delete();
        }

        //User::deleteAll(['id' => $id]);

        return $this->redirect('/user/list');
    }
}