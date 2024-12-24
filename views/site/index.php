<?php
/** @var yii\web\View $this */
/** @var app\models\Member[] $members */
/** @var app\models\Team $team */
/** @var app\models\Comments[] $comments */

use yii\bootstrap5\Html;
?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">南开大学互联网数据库小组</h1>
        <p class="lead subtitle-font-size text-primary font-weight-bold mt-4" style="font-size: 2rem;">NKU不睡觉小分队</p> <!-- Increase font size for NKU不睡觉小分队 -->

        <p class="lead">欢迎来到我们的团队主页</p>

        <p><a class="btn btn-lg btn-success" href="https://dbis.nankai.edu.cn/teachers/list.htm">加入我们</a></p>
    </div>

     <!-- 在团队介绍上方插入视频 -->
     <div class="video-container text-center mb-5"> <!-- Added margin-bottom to create spacing -->
        <video width="100%" height="auto" autoplay loop muted>
            <source src="<?= Yii::$app->request->baseUrl ?>/videos/team_intro.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="body-content">
        <!-- 团队展示部分 -->
        <div class="row flex-column mb-5"> <!-- Increased bottom margin for spacing -->
            <div class="col-lg-12 mb-3">
                <h2 class="text-primary">团队展示</h2> <!-- Title in blue -->
                <p><?= Html::encode($team->content) ?></p>

                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['site/about']) ?>">详细介绍 &raquo;</a></p>
            </div>
        </div>

        <!-- 个人展示部分 -->
        <div class="row">
            <?php
                // 注册CSS样式
                $this->registerCss("
                    .avatar {
                        margin-right: 2rem; /* 调整头像和文字之间的间距 */
                    }
                    .member-info p {
                        font-size: 1.1rem; /* Adjust font size for member info */
                    }
                    .member-info h3 {
                        font-size: 1.25rem; /* Adjust font size for member titles */
                        text-decoration: underline; /* Underline member titles */
                    }
                ");
            ?>
            <!-- 动态加载组员信息 -->
            <?php foreach ($members as $index => $member): ?>
                <div class="col-lg-12 mb-3">
                    <div class="d-flex align-items-start">
                        <div class="avatar">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/<?= Html::encode($member->avatar) ?>" alt="头像" class="rounded-circle" width="128">
                        </div>
                        <div class="content member-info">
                            <h3>组员<?= $index + 1 ?>：<?= Html::encode($member->name) ?></h3>
                            <p>专业：<?= Html::encode($member->major) ?></p>
                            <p><?= Html::encode($member->bio) ?></p>
                            <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['site/about']) ?>">了解更多 &raquo;</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <!-- 留言板部分 -->
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h2 class="text-primary">留言板</h2> <!-- Title in blue -->

                <?php if (!empty($comments)): ?>
                    <!-- 遍历所有留言并显示 -->
                    <?php foreach ($comments as $index => $comment): ?>
                        <div class="comment mb-3" style="border-radius: 15px; padding: 15px; background-color: #f8f9fa; border: 1px solid #ddd; margin-top: <?= $index === 0 ? '20px' : '10px' ?>;">
                            <div class="d-flex align-items-center mb-2">
                                <img src="<?= Yii::$app->request->baseUrl ?>/images/<?= Html::encode($comment->avatar) ?>" alt="用户头像" class="rounded-circle" width="30" height="30">
                                <span class="ml-3">&nbsp;&nbsp;<?= Html::encode($comment->name) ?>: <?= Html::encode($comment->content) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>暂无留言</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- 按钮部分 -->
        <div class="d-flex justify-content-center mb-4"> <!-- Centered buttons -->
            <?php
                use yii\helpers\Url;
                // 第一个按钮
                $eqlistUrl = Url::to(['eqlist/search']);
                echo Html::button('地震数据库检索', ['onclick' => "window.location.href='" . $eqlistUrl . "';", 'class' => 'btn btn-primary mx-2']);
                // 第二个按钮
                $eqlistUrl = Url::to(['eqlist/detail']);
                echo Html::button('震灾详细数据检索', ['onclick' => "window.location.href='" . $eqlistUrl . "';", 'class' => 'btn btn-primary mx-2']);       
            ?>
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

    .content p {
        line-height: 1.2;
    }
    .content h3 {
        line-height: 2;
        margin-top: 0px;
    }

    .comment {
        margin-bottom: 20px;
    }

    .text-primary {
        color: #007bff !important; /* Blue text color */
    }

    .font-weight-bold {
        font-weight: bold !important; /* Bold text */
    }
");
?>
