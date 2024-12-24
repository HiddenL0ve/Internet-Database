<?php
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'Name',
        'Date',
        'PlaceName',
        'Magnitude',
        'Depth',
        'Longitude',
        'Latitude',
    ],
]);