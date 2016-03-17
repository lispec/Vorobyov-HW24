<?php

use yii\helpers\Html;
?>

<p>Добавлен преподаватель со следующими данными:</p>

<ul>
    <li><label>First Name</label>: <?= Html::encode($teacher->firstName)?></li>
    <li><label>Last Name</label>: <?= Html::encode($teacher->lastName)?></li>
    <li><label>Position</label>: <?= Html::encode($teacher->position)?></li>
    <li><label>Email</label>: <?= Html::encode($teacher->email)?></li>
</ul>
