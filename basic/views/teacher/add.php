<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Форма добавления студента</h1>

<?php

$form = ActiveForm::begin([
    'enableClientValidation' => false,
]);

echo $form->field($student, 'firstName');
echo $form->field($student, 'lastName');
echo $form->field($student, 'group');
echo $form->field($student, 'email');

echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);

ActiveForm::end();

?>
