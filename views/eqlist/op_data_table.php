<?php
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        '観測点名',
        '都道府県',
        '震度',
        'Latitude',
        'Longitude',
    ],
]);