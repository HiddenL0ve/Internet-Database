<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：create.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：周末2211349
 * 
 * 功能简介：
 * 这是留言创建页面。管理员可以创建新的用户留言。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
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
