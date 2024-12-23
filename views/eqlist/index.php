<!-- Eqlist Index View -->
<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Earthquake Data Query';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'queryForm']); ?>

        <?= $form->field($model, 'date')->input('date') ?>
        <?= $form->field($model, 'placeName')->input('text') ?>
        <?= $form->field($model, 'magnitude')->input('number') ?>

        <div class="form-group">
            <?= Html::submitButton('Query', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <div id="results">
        <!-- Results will be displayed here -->
    </div>

    <script>
        document.getElementById('queryForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= \yii\helpers\Url::to(['site/search']) ?>', true);
            xhr.onload = function() {
                if (this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    displayResults(response);
                } else {
                    console.error('An error occurred during the query.');
                }
            };
            xhr.send(formData);
        });

        function displayResults(data) {
            var resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '<h2>Results:</h2><table><tr><th>Date</th><th>Hour</th><th>Minute</th><th>Second</th><th>Place Name</th><th>Latitude</th><th>Longitude</th><th>Depth</th><th>Magnitude</th><th>Max Intensity</th></tr>';

            data.forEach(function(item) {
                resultsDiv.innerHTML += '<tr>' +
                    '<td>' + item.date + '</td>' +
                    '<td>' + item.hour + '</td>' +
                    '<td>' + item.minute + '</td>' +
                    '<td>' + item.second + '</td>' +
                    '<td>' + item.placeName + '</td>' +
                    '<td>' + item.latitudeD + '° ' + item.latitudeM + '′</td>' +
                    '<td>' + item.longitudeD + '° ' + item.longitudeM + '′</td>' +
                    '<td>' + item.depth + '</td>' +
                    '<td>' + item.magnitude + '</td>' +
                    '<td>' + item.maxIntensity + '</td>' +
                    '</tr>';
            });

            resultsDiv.innerHTML += '</table>';
        }
    </script>
</div>