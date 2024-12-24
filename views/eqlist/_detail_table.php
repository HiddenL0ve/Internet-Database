<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：_detail_table.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：陈星烨2212518
 * 
 * 功能简介：
 * 这是用于显示震灾详细信息的表格部分。用户可以查看选定事件的详细信息，
 * 包括震度、位置等。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
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