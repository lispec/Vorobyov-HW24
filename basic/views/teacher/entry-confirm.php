<?php
use yii\helpers\Html;
?>

<p>Добавлен студент со следующими данными:</p>

<ul>
    <li><label>First Name</label>: <?= Html::encode($student->firstName) ?></li>
    <li><label>Last Name</label>: <?= Html::encode($student->lastName) ?></li>
    <li><label>Group</label>: <?= Html::encode($student->group) ?></li>
    <li><label>Email</label>: <?= Html::encode($student->email) ?></li>
</ul>