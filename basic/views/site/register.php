<!--подключвем скрипт-->
<script src='https://www.google.com/recaptcha/api.js'></script>


<?php

use yii\widgets\ActiveForm;


$form = ActiveForm::begin();

echo $form->field($model, 'firstName');
echo $form->field($model, 'lastName');
echo $form->field($model, 'email');
echo $form->field($model, 'passwordHash')->input('password');
echo $form->field($model, 'passwordConfirm')->input('password');
?>
<div class="g-recaptcha" data-sitekey="<?php echo $siteKey ?>"></div>

<?php
//echo $form->field($model, 'sex')->dropDownList(['male' => 'Мужчина', 'female' => 'Женщина', 'оnо' => 'ono']);

echo \yii\helpers\Html::submitButton();

ActiveForm::end();