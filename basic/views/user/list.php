<h1>Users</h1>

<?php

echo \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $filterModel,
    'columns' => [
        'id',
        'firstName' => [
            'attribute' => 'firstName',
//            'enableSorting' => false,
        ],
        'lastName' => [
            'attribute' => 'lastName',
//            'enableSorting' => false,
        ],
        'email' => [
            'attribute' => 'email',
//            'enableSorting' => false,
        ],


        [
            'header' => 'Edit',
            'content' => function ($model) {
                return \yii\bootstrap\Html::a('Edit', ['/user/edit', 'id' => $model->id]);
            }
        ],
        [
            'header' => 'Delete',
            'content' => function ($model) {
                return \yii\bootstrap\Html::a('Delete', ['/user/delete', 'id' => $model->id]);
            }
        ],
    ]
]);