<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Форма добавления студента</h1>

<?php

$form = ActiveForm::begin([
    'enableClientValidation' => false,
]);

echo $form->field($model, 'firstNameStudent');
echo $form->field($model, 'lastNameStudent');
echo $form->field($model, 'group');
echo $form->field($model, 'emailStudent');

echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);

ActiveForm::end();

?>
