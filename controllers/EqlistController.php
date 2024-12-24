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
use app\models\Detail;
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

    public function actionDetail()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Detail::find(),
            'pagination' => false, // 不需要分页
        ]);

        return $this->render('detail', [
            'detailDataProvider' => $dataProvider,
        ]);
    }

    public function actionGetDetail($eventName)
    {
        $query = Detail::find()->where(['Name' => $eventName]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->renderPartial('_detail_table', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGetOpData($eventName)
    {
        $model = Detail::findOne(['Name' => $eventName]);
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
        
        $index = $model->Index;
        $tableName = 'op_data' . $index;
        
        // 使用 Query 对象而不是查询结果数组
        $query = (new \yii\db\Query())
            ->from($tableName); 

        $dataProvider = new ActiveDataProvider([
            'query' => $query, // 这里传递 Query 对象
        ]);

        return $this->renderPartial('op_data_table', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
