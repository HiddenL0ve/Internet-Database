<?php
/* @var $this yii\web\View */
/* @var $comments app\models\Comments[] */
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：signup.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：周末2211349
 * 
 * 功能简介：
 * 这是网站的注册页面视图文件。它提供了用户注册表单，
 * 包括用户名、密码输入框选项。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
/** @var yii\web\View $this */
/** @var app\models\SignupForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

<div id="footer-background"></div>

<?php
$this->registerCss("
    #footer-background {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/images/bg_nku.png');
        background-size: cover;
        background-position: center;
        z-index: -1;
    }

    #footer {
        position: relative;
        z-index: 1;
    }
");