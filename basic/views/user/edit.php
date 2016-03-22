<?php

$form = \yii\widgets\ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]);

echo $form->field($model, 'firstName');
echo $form->field($model, 'lastName');
echo $form->field($model, 'avatar')->input('file');
echo $form->field($model, 'schoolId')->dropDownList($schools);
echo \yii\helpers\Html::submitButton();