<?php
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