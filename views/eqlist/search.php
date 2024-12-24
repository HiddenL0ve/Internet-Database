<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：search.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：孙致勉2211278
 * 
 * 功能简介：
 * 这是地震数据库的检索页面。用户可以通过输入时间范围
 * 和震级范围来查询地震记录。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EqlistSearch */

$this->title = '地震数据库检索';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'queryForm']); ?>

        <?= $form->field($model, 'startDate')->input('text')->hint('请输入开始时间，格式： YYYY-MM-DD') ?>
        <?= $form->field($model, 'endDate')->input('text')->hint('请输入结束时间，格式： YYYY-MM-DD') ?>

        <?= $form->field($model, 'minMagnitude')->input('number') ?>
        <?= $form->field($model, 'maxMagnitude')->input('number') ?>

        <div class="form-group">
            <?= Html::submitButton('Query', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>