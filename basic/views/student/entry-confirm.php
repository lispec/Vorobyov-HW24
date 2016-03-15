<?php

use yii\helpers\Html;
?>

<p>Добавлен преподаватель со следующими данными:</p>

<ul>
    <li><label>First Name</label>: <?= Html::encode($model->firstNameTeacher)?></li>
    <li><label>First Name</label>: <?= Html::encode($model->lastNameTeacher)?></li>
    <li><label>First Name</label>: <?= Html::encode($model->position)?></li>
    <li><label>First Name</label>: <?= Html::encode($model->emailTeacher)?></li>
</ul>
