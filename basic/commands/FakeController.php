<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\commands;

use app\models\School;
use app\models\User;
use Faker\Factory;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 * This command is provided as an example for you to learn how to create console commands.
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FakeController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function getGenerator()
    {
        if ($this->_generator === null) {
           $language = $this->language === null ? Yii::$app->language : $this->language;
            $this->_generator = Factory::create(str_replace('-', '_', $language));
        }
        return $this->_generator;
    }

    public function actionSchools($count) {
            $faker = Factory::create();

            for($i=0;$i<$count;$i++) {
                    $school = new School([
                            'scenario' => 'add',
                            'attributes' => [
                                    'name' => $faker->word,
                                ],
                        ]);

                    $school->save();
                }
    }

    public function actionUsers($count)
    {
        $faker = Factory::create();
        //$faker->
        for ($i = 0; $i < $count; $i++) {
            $user = new User([
                'scenario' => 'safe',
                'attributes' => [
                    'email' => $faker->email,
                    'firstName' => $faker->word,
                    'lastName' => $faker->sentence(2),
                    'passwordHash' => \Yii::$app->security->generatePasswordHash('123'),
                    'createAt' => date('Y-m-d H:i:s'),
                    'updatedAt' => date('Y-m-d H:i:s'),
                    'authKey' => \Yii::$app->security->generateRandomString(),
                ],
            ]);
            $user->save(false);
        }
        echo $count . "\n";
    }
}