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
        <p class="lead subtitle-font-size">NKU不睡觉小分队</p>

        <p class="lead">欢迎来到我们的团队主页</p>

        <p><a class="btn btn-lg btn-success" href="https://www.ethan2k04.icu/">加入我们</a></p>
    </div>

     <!-- 在团队介绍上方插入视频 -->
     <div class="video-container text-center">
        <video width="100%" height="auto" autoplay loop muted>
            <source src="<?= Yii::$app->request->baseUrl ?>/videos/team_intro.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="body-content">
        <!-- 团队展示部分 -->
        <div class="row flex-column mb-4">
            <div class="col-lg-12 mb-3">
                <h2>团队展示</h2>
                <p><?= Html::encode($team->content) ?></p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
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
                ");
            ?>
            <!-- 动态加载组员信息 -->
            <?php foreach ($members as $index => $member): ?>
                <div class="col-lg-12 mb-3">
                    <div class="d-flex align-items-start">
                        <div class="avatar">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/<?= Html::encode($member->avatar) ?>" alt="头像" class="rounded-circle" width="128">
                        </div>
                        <div class="content">
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
                <h2>留言板</h2>

                <?php if (!empty($comments)): ?>
                    <!-- 遍历所有留言并显示 -->
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <p><strong>用户名：</strong><?= Html::encode($comment->name) ?></p>
                            <p><strong>内容：</strong><?= Html::encode($comment->content) ?></p>
                            <hr>  <!-- 分割线 -->
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>暂无留言</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

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
    .comment hr {
        border: 1px solid #ddd;
        margin-top: 10px;
        margin-bottom: 10px;
    }
");
?>
