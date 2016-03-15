<?php
use yii\helpers\Html;
?>

<p>Добавлен студент со следующими данными:</p>

<ul>
    <li><label>First Name</label>: <?= Html::encode($model->firstNameStudent) ?></li>
    <li><label>Last Name</label>: <?= Html::encode($model->lastNameStudent) ?></li>
    <li><label>Last Name</label>: <?= Html::encode($model->group) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->emailStudent) ?></li>
</ul>