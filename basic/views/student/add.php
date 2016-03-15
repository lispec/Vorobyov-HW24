<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>Форма добавления преподавателя</h1>

<?php

$form = ActiveForm::begin();

echo $form->field($model, 'firstNameTeacher');
echo $form->field($model, 'lastNameTeacher');
echo $form->field($model, 'position');
echo $form->field($model, 'emailTeacher');

echo Html::submitButton('Submit', ['btn btn-primary']);

ActiveForm::end();

?>