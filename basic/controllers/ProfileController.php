<?php

namespace app\controllers;

use yii\web\Controller;

class ProfileController extends Controller{

    public function actionIndex($id = false, $foo = false){
        return $this->render('index');
    }
}