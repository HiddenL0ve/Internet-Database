<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：op_data_table.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：陈星烨2212518
 * 
 * 功能简介：
 * 这是地震观测数据表格页面。用户可以查看各观测点的震度、
 * 位置等信息。
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
        '観測点名',
        '都道府県',
        '震度',
        'Latitude',
        'Longitude',
    ],
]);