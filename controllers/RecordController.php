<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class RecordController extends Controller
{
    /**
     * Displays homepage with image.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
