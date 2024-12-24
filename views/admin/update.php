<?php
/* @var $this yii\web\View */
/* @var $model app\models\Comments */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = '编辑留言: ' . $model->id;
?>
<div class="admin-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 留言更新表单 -->
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
