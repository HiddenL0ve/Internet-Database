<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '震灾详细';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eqlist-detail">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- 单选框 -->
    <div>
        <select id="eventName" onchange="updateDetail()">
            <option value="">请选择事件</option>
            <?php
            // 假设 $detailDataProvider 是从 detail 表中获取所有 Name 的数据提供者
            foreach ($detailDataProvider->getModels() as $model) {
                echo '<option value="' . $model->Name . '">' . $model->Name . '</option>';
            }
            ?>
        </select>
    </div>

    <!-- 表格 -->
    <div id="detailTable">
        <!-- 这里将通过 AJAX 动态加载选中的事件的详细信息 -->
    </div>

    <!-- 大表格 -->
    <div id="opDataTable">
        <!-- 内容将通过 AJAX 动态加载 -->
    </div>
</div>

<script>
function updateDetail() {
    var eventName = document.getElementById('eventName').value;
    
    // AJAX 请求更新 detail 表格
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?= Url::to(['eqlist/get-detail']) ?>?eventName=' + encodeURIComponent(eventName), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // 更新 detail 表格内容
            document.getElementById('detailTable').innerHTML = xhr.responseText;
            // 之后加载 op_data 表格
            updateOpData(eventName);
        }
    };
    xhr.send();
}

function updateOpData(eventName) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?= Url::to(['eqlist/get-op-data']) ?>' + '?eventName=' + encodeURIComponent(eventName), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // 更新 op_data 表格内容
            document.getElementById('opDataTable').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>