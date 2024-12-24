<?php
/* @var $this yii\web\View */
/* @var $comments app\models\Comments[] */
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：login.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：殷腾骄2212202
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
use yii\bootstrap5\Html;
use yii\bootstrap5\Alert;

$this->title = '后台管理 - 留言列表';
?>
<div class="admin-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 创建新留言按钮 -->
    <?= Html::a('创建新留言', ['create'], ['class' => 'btn btn-success mb-3']) ?>

    <!-- 显示闪存消息 -->
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <?= Alert::widget([
            'options' => ['class' => 'alert-success'],
            'body' => Yii::$app->session->getFlash('success'),
        ]) ?>
    <?php endif; ?>

    <!-- 留言列表表格 -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>内容</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= Html::encode($comment->id) ?></td>
                    <td><?= Html::encode($comment->name) ?></td>
                    <td><?= Html::encode($comment->content) ?></td>
                    <td>
                        <?= Html::a('编辑', ['update', 'id' => $comment->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $comment->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => '确定要删除这条留言吗？',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
