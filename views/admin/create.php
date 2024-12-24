<?php
/* @var $this yii\web\View */
/* @var $model app\models\Comments */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = '创建新留言';
?>
<div class="admin-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 留言创建表单 -->
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
