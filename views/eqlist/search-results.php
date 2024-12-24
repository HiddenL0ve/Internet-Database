<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\EqlistSearch */

$this->title = '检索结果';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search-results">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $model,
        'columns' => [
            'Date',
            'Magnitude',
            'PlaceName',
            'Depth',
            // 其他需要显示的列...
        ],
    ]); ?>
</div>