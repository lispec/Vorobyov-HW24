<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\HttpException;
use yii\web\IdentityInterface;

use Yii;
use yii\base\Model;


// класс для создания его в action-е в контроллере - для вызова метода и в нем чтобы применялось много запросов
// (также для вызова notAssigned() надо в class User пееопределить метод find() иначе он будет работать по умочанию)
class UserQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function notAssigned()
    {
        return $this->andWhere(['schoolId' => null])
            ->orderBy('id DESC');
    }
}

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $firstName
 * @property string $lastName
 * @property string $passwordHash
 * @property string $createdAt
 * @property string $updatedAt
 * @property string $authKey
 *
 * @property School $school
 * @property Course [] $courses
 */
//class User extends ActiveRecord {
class User extends ActiveRecord implements IdentityInterface
{

    public $passwordConfirm;
    public $rememberMe = true;
    public $avatar;

    /**
     * @return UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }




//    public $sex;        // выбор пола при регистрации


//    public function login()
//    {
//        if ($this->validate()) {
//
////            var_dump($this->getUser());
////            die;
//
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
//        }
//        return false;
//    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new HttpException(500);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function rules()
    {
        return [
//            [['firstName', 'lastName', 'email', 'passwordHash', 'createdAt', 'updatedAt'], 'safe', 'on' => 'safe'],
            [['firstName', 'lastName', 'email', 'passwordHash', 'passwordConfirm'], 'required', 'on' => ['register',]],
//            ['email', 'required', 'on' => ['login']],
//            ['email', 'email', 'on' => ['login']],
////            ['password', 'required', 'on'=>'login'],
            ['passwordHash', 'string', 'min' => 3, 'on' => 'register'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'passwordHash', 'on' => 'register', 'message' => 'Пароли не совпадают!'],
            ['email', 'unique', 'on' => 'register'],
//            //['sex', 'in', 'range' => ['male', 'female'], 'on' => 'register'],

            // Миша правила 28 урок
            [['firstName', 'lastName', 'schoolId'], 'required', 'on' => 'edit'],
            ['schoolId', 'exist', 'targetClass' => School::className(), 'targetAttribute' => 'id', 'on' => 'edit'],
            ['avatar', 'file', 'on' => 'edit'],


            // мои правила
            ['email', 'required', 'on' => 'login'],
            ['email', 'email', 'on' => 'login'],
            ['passwordHash', 'required', 'on' => 'login'],

            // мои правила 29 дз

            [['email', 'firstName', 'lastName'], 'safe', 'on' => 'search']
//            ['email', 'safe', 'on' => 'search']
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->createdAt = date('Y-m-d H:i:s');
            $this->passwordHash = \Yii::$app->security->generatePasswordHash($this->passwordHash);
            $this->authKey = \Yii::$app->security->generateRandomString();
        }
        $this->updatedAt = date('Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'schoolId']);
    }

    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'courseId'])->viaTable('userCourse', ['userId' => 'id']);
    }


    public static function tableName()
    {
        return 'user';
    }

    public function attributeLabels()
    {
        return [
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'passwordHash' => 'Password',

        ];
    }

    public function getUser()
    {
//        if ($this->_user === false) {
//            $this->_user = User::findByUsername($this->username);
        return User::findOne(['email' => $this->email]);
//        }

//        return $this->_user;
    }


}