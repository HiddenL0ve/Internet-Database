<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：record/index.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：陈星烨2212518
 * 
 * 功能简介：
 * 本页面展示了地震相关的数据可视化图表，包含以下几部分内容：
 * 1. 震源气泡图：展示了地震震源的位置分布，使用气泡图表示不同震源的强度与位置。
 * 2. 地震数量条形图：展示了不同时间段内的地震发生数量，使用条形图进行可视化。
 * 3. 地震时间动画图：以动画方式展示地震发生的时间序列，帮助用户直观了解地震发生的时序变化。
 * 4. 烈度数据：展示不同地区的地震烈度数据，使用图表形式展示烈度分布。
 *
 * 页面主要通过图像和可视化展示地震数据，帮助用户快速理解地震的时空特性。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
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

