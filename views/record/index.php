<?php
/* @var $this yii\web\View */
$this->title = 'Record Page';
?>

<!-- 页面标题 -->
<h1 class="page-title"><?= $this->title ?></h1>

<!-- 在这里直接写 CSS 样式 -->
<style>
    /* 设置页面的基础样式 */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f9;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .page-title {
        text-align: center;
        color: #333;
        font-size: 32px;
        margin-top: 20px;
    }

    /* 页面内容区样式 */
    .content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    /* 每个图像容器样式 */
    .image-container {
        margin-bottom: 30px;
        text-align: center;
        max-width: 80%;
    }

    /* 标题样式 */
    .section-title {
        font-size: 24px;
        color: #0056b3;
        margin-bottom: 10px;
    }

    /* 图片样式 */
    .image {
        width: 100%;
        max-width: 800px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="content-wrapper">
    <!-- 震源气泡图 -->
    <div class="image-container">
        <h2 class="section-title">震源气泡图</h2>
        <img class="image" src="<?= Yii::$app->request->baseUrl ?>/images/sample1.png" alt="震源气泡图">
    </div>

    <!-- 地震数量条形图 -->
    <div class="image-container">
        <h2 class="section-title">地震数量条形图</h2>
        <img class="image" src="<?= Yii::$app->request->baseUrl ?>/images/sample2.png" alt="地震数量条形图">
    </div>

    <!-- 地震时间动画图 -->
    <div class="image-container">
        <h2 class="section-title">地震时间动画图</h2>
        <img class="image" src="<?= Yii::$app->request->baseUrl ?>/images/sample3.png" alt="地震时间动画图">
    </div>

    <!-- 烈度数据 -->
    <div class="image-container">
        <h2 class="section-title">烈度数据</h2>
        <img class="image" src="<?= Yii::$app->request->baseUrl ?>/images/sample4.png" alt="烈度数据">
    </div>
</div>

