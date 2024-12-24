<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：search-results.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：陈星烨2212518
 * 
 * 功能简介：
 * 这是地震数据库检索结果页面。用户可以查看根据输入条件
 * 检索到的地震记录。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
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