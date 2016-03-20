<?php

namespace app\controllers;

use app\models\Comment;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

use yii\base\Model;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {

        //var_dump(Yii::$app->user->identity->email);
        //die;

        if (Yii::$app->user->isGuest) {
            return $this->render('foo');
        }

        //Yii::$app->user->log

//        if(Yii::$app->request->cookies->get('notGuest')) {
//            return $this->render('sajdsajdkas');
//        } else {
//            return $this->render('asdsadasd');
//        }


//        $model = new User([
//            'scenario' => 'safe',
//            'attributes' => [
//                'firstName' => 'fff',
//                'lastName' => 'ddd',
//                'email' => 'asdasdasdsa@saddsad.ccc',
//                'passwordHash' => 'sddasdsada',
//            ],
//        ]);
//
//        $model->save();
//
//        $model->firstName = 'Vasia';
//        $model->save();

        return $this->render('index');
    }


    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User([
            'scenario'=>'login'
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        //Yii::$app->session->addFlash('contactFormSubmitted', 'HELLO!');
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        $model = new Comment();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            var_dump($model->name);
            die;
        }

        return $this->render('about', [
            'model' => $model,
        ]);
    }

    //для добавления в БД
    public function actionAdd()
    {
        //User::findOne([...])
        //User::findAll([...])

        $user = new User();

//        $user->createdAt = date('Y-m-d H:i:s');
        $user->updatedAt = date('Y-m-d H:i:s');

        if ($user->load(Yii::$app->request->post()) && $user->validate()) {


            $user->save();
            ///$user->passwordHash = '';
        }

        return $this->render('add', [
            'model' => $user,
        ]);
    }

    public function actionFoo()
    {

//        $users = User::findAll([
//            'authKey' => null,
//            'firstName' => 'Vasia'
//        ]);

        $user = User::find()->where(['firstName' => 'Vasia'])->one();

        var_dump($user);

        //$user->email = 'hohohohoh@fsdfdsf.ccc';
        //echo $user->email;
        $user = new User();
        $user->email = 'sadsadsad@asdasd.ccc';
        $user->firstName = 'sadasdasd';
        $user->lastName = "dsfsdfdsf";
        $user->passwordHash = 'sadsad';
        $user->createdAt = date('Y-m-d H:i:s');
        $user->updatedAt = date('Y-m-d H:i:s');

        var_dump($user);

        $user->save(false);     // сохранить без валидации

        echo "Hello";

        //$user->save(false);

        die;


        //var_dump($user);
        //die;

        //var_dump($users);
        //die;
        //throw new \Exception('sadhasudhsad')

        //return $foo;

        return $this->render('foo');
        //return 'Hello';
    }


    public function actionRegister()
    {
//
//        // 2 СПОСОБ
//        $model = new User();
//        $model->setScenario('register');
        // но лучше это за один шаг сделать

        $model = new User([
//            'scenario' => 'register'
            'scenario' => 'login'
        ]);

//        $model = new User();

        //проверка post и если все ок то логиним
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->user->login($model, 60 * 60 * 24 * 30);
            return $this->goHome();
        }

        //вывод формы регистрации
        return $this->render('register', [
            'model' => $model,
        ]);
    }


}
