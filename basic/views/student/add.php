<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<h1>Форма добавления преподавателя</h1>

<?php

$form = ActiveForm::begin();

echo $form->field($teacher, 'firstName');
echo $form->field($teacher, 'lastName');
echo $form->field($teacher, 'position');
echo $form->field($teacher, 'email');

echo Html::submitButton('Submit', ['btn btn-primary']);

ActiveForm::end();

?>