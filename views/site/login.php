<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：login.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：周末2211349
 * 
 * 功能简介：
 * 这是网站的登录页面视图文件。它提供了用户登录表单，
 * 包括用户名、密码输入框，以及"记住我"选项。
 * 同时还显示了登录提示信息和背景图片设置。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <!-- 用户名输入框 -->
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <!-- 密码输入框 -->
            <?= $form->field($model, 'password')->passwordInput() ?>

            <!-- 记住我复选框 -->
            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <!-- 登录按钮 -->
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <div style="color:#999;">
                <!-- 提示用户登录信息 -->
                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                To modify the username/password, please check out the code <code>app\models\User::$users</code>.
            </div>

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