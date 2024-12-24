<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Comments;

/**
 * AdminController 负责后台管理
 */
class AdminController extends Controller
{
    /**
     * 定义访问控制规则，只允许已登录用户访问
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'create', 'update', 'delete', 'toggle-publish'],
                'rules' => [
                    [
                        'allow' => true,
                        // 'roles' => ['@'], // 只允许已登录用户
                    ],
                ],
            ],
        ];
    }

    /**
     * 显示所有留言
     *
     * @return string
     */
    public function actionIndex()
    {
        $comments = Comments::find()->all(); // 获取所有留言

        return $this->render('index', [
            'comments' => $comments,
        ]);
    }

    /**
     * 创建新留言
     *
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Comments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '留言已成功创建。');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * 更新留言
     *
     * @param integer $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '留言已成功更新。');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 删除留言
     *
     * @param integer $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        Yii::$app->session->setFlash('success', '留言已删除。');
        return $this->redirect(['index']);
    }

    /**
     * 切换留言的发布状态
     *
     * @param integer $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionTogglePublish($id)
    {
        $model = $this->findModel($id);

        $model->is_published = !$model->is_published;

        if ($model->save(false, ['is_published'])) { // 仅保存 is_published 字段
            Yii::$app->session->setFlash('success', '留言发布状态已更新。');
        } else {
            Yii::$app->session->setFlash('error', '更新发布状态时出错。');
        }

        return $this->redirect(['index']);
    }

    /**
     * 查找留言模型
     *
     * @param integer $id
     * @return Comments
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的留言不存在。');
    }
}
