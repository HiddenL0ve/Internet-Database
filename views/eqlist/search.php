<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EqlistSearch */

$this->title = 'Earthquake Data Query';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'queryForm']); ?>

        <?= $form->field($model, 'startDate')->input('text')->hint('Enter the start date in YYYY-MM-DD format') ?>
        <?= $form->field($model, 'endDate')->input('text')->hint('Enter the end date in YYYY-MM-DD format') ?>

        <?= $form->field($model, 'minMagnitude')->input('number') ?>
        <?= $form->field($model, 'maxMagnitude')->input('number') ?>

        <div class="form-group">
            <?= Html::submitButton('Query', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>