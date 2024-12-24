<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = '关于我们 - 南开大学互联网数据库小组';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about container mt-5">
    <h1 class="text-center mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="team-introduction mb-5">
        <h3 class="text-primary mb-3">我们的使命</h3>
        <p class="lead text-muted">
            作为一个由南开大学计算机科学与技术专业的学生组成的团队，我们深入研究现代互联网技术，包括但不限于大数据处理、云计算、数据库优化、人工智能等领域。我们旨在通过实际项目的探索，积累更多的技术经验，提升团队的技术能力和创新思维。
        </p>
    </div>

    <div class="team-image mb-5">
        <h3 class="text-primary mb-3">团队合照</h3>
        <div class="text-center">
            <img src="<?= Yii::$app->request->baseUrl ?>/images/image.png" alt="团队合照" class="img-fluid rounded shadow-lg" width="512">
        </div>
    </div>

    <div class="download-section mb-5">
        <h3 class="text-primary mb-3">下载我们的项目</h3>
        <p class="lead text-muted mb-4">
            你可以下载我们的技术文档和项目源代码，了解更多我们正在进行的研究和开发工作。点击下面的链接进行下载：
        </p>
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <a href="<?= Yii::$app->request->baseUrl ?>/files/project_documentation.pdf" class="btn btn-outline-primary" target="_blank">项目文档 (PDF)</a>
            <a href="<?= Yii::$app->request->baseUrl ?>/files/source_code.zip" class="btn btn-outline-secondary" target="_blank">源代码 (ZIP)</a>
        </div>
    </div>

    <div class="contact-info mb-5">
        <h3 class="text-primary mb-3">可视化项目</h3>
        <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['record/index']) ?>">查看 &raquo;</a></p>
    </div>

    <div class="contact-info mb-5">
        <h3 class="text-primary mb-3">联系我们</h3>
        <p class="lead text-muted mb-4">
            如果你对我们的工作有任何问题或想要合作，欢迎通过以下方式联系我们：
        </p>
        <p>Email: <a href="mailto:nku.idb.team@gmail.com">nku.idb.team@gmail.com</a></p>
        <p>Twitter: <a href="https://twitter.com/NKU_IDB" target="_blank">@NKU_IDB</a></p>
    </div>
</div>

<?php
$this->registerJsFile('@web/datav/mainBin.js', ['depends' => 'yii\web\JqueryAsset', 'type' => 'module']);
?>

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

    .site-about p {
        line-height: 1.6;
    }

    .site-about h3 {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .site-about .text-muted {
        color: #6c757d;
    }

    .site-about .btn {
        border-radius: 0.25rem;
    }

    .site-about .btn-outline-primary,
    .site-about .btn-outline-secondary {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }

    .site-about .team-image img {
        max-width: 80%;
        height: auto;
        border-radius: 1rem;
    }

    .site-about .container {
        max-width: 960px;
    }
");
?>
