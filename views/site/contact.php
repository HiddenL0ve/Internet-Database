<?php
/**
 * 南开大学互联网数据库小组网站
 *
 * 文件名：contact.php
 * 
 * 团队：NKU不睡觉小分队
 * 编写者：殷腾骄2212202
 * 
 * 功能简介：
 * 这是网站的团队联系方式界面，它显示了一张动态加载的
 * 地图，标明了我们小组的工作地址，同时还包括团队邮箱和电话。
 *
 * @link      https://dbis.nankai.edu.cn
 * @copyright Copyright (c) 2025 NKU Internet Database Team
 * @license   https://opensource.org/licenses/MIT MIT License
 */
/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <div id="map" style="width: 100%; height: 400px;"></div>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <h3>联系方式</h3>
            <p>
                欢迎前来南开大学津南校区学生宿舍1D319与我们联系，地址如下：
            </p>
            <ul>
                <li><strong>地址：</strong> 南开大学津南校区 学生宿舍 1D319</li>
                <li><strong>联系电话：</strong> +86 123 456 7890</li>
                <li><strong>电子邮箱：</strong> example@nankai.edu.cn</li>
            </ul>
            <p>
                我们的办公时间是：周一至周五 09:00 - 17:00。欢迎来访或通过电话、邮件联系我们。
            </p>
        </div>
    </div>
</div>

<!-- Include the Leaflet CSS and JavaScript -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    var map;

    function initMap() {
        // Set the default location (南开大学津南校区)
        const defaultLocation = [38.99101260193781, 117.33727796806276];

        // Create a map and set the initial view
        map = L.map('map').setView(defaultLocation, 15);

        // Add OpenStreetMap tiles to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker for the current location
        L.marker(defaultLocation).addTo(map)
            .bindPopup('南开大学津南校区 学生宿舍 1D319')
            .openPopup();
    }

    // Initialize the map when the page is loaded
    document.addEventListener('DOMContentLoaded', function () {
        initMap();
    });
</script>

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