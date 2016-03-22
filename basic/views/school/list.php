<h1>Schools</h1>

<?php

echo \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'name' => [
            'attribute' => 'name',
            //'enableSorting' => false,
        ],
        [
            'header' => 'Edit',
            'content' => function ($model) {
                return \yii\bootstrap\Html::a('Edit', ['/school/edit', 'id' => $model->id]);
            }
        ],
        [
            'header' => 'Delete',
            'content' => function ($model) {
                return \yii\bootstrap\Html::a('Delete', ['/school/delete', 'id' => $model->id]);
            }
        ],
    ],
]);

?>