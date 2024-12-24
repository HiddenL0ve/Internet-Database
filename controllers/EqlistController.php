<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Member;
use app\models\Team;
use app\models\Comments;
use app\models\Eqlist;
use app\models\EqlistSearch;
use yii\data\ActiveDataProvider;

class EqlistController extends Controller
{
    // public $layout = "main";
    public function actionIndex()
    {
        $model = new Eqlist();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSearch()
    {
        $model = new EqlistSearch();
        
        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $dataProvider = $model->search(Yii::$app->request->get());
        } else {
            // 如果没有有效的搜索条件，返回一个空的DataProvider
            $dataProvider = new ActiveDataProvider([
                'query' => Eqlist::find(),
                'pagination' => [
                    'pageSize' => 10, // 设置每页显示的记录数
                ],
            ]);
        }

        // 设置默认的分页参数
        $dataProvider->pagination->pageSize = 10;

        return $this->render('search', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }
}
