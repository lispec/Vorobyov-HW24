<h1>Add new school</h1>

<?php

$form = \yii\widgets\ActiveForm::begin([]);

echo $form->field($model, 'name');
echo \yii\helpers\Html::submitButton('Add');