<?php

namespace app\controllers;

use Yii; // 确保引入 Yii 类
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        $model = new ContactForm(); // 创建 ContactForm 模型实例

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 如果表单提交并验证通过，可以在此发送邮件或执行其他逻辑
            Yii::$app->session->setFlash('contactFormSubmitted', 'Thank you for contacting us.');
            return $this->refresh(); // 刷新页面
        }

        return $this->render('contact', [
            'model' => $model, // 将模型传递到视图
        ]);
    }

    public function actionLogin()
{
    if (!Yii::$app->user->isGuest) {
        return $this->goHome(); // 如果用户已登录，跳转到首页
    }

    $model = new LoginForm();

    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->goBack(); // 登录成功后返回上一页
    }

    $model->password = ''; // 清空密码字段

    return $this->render('login', [
        'model' => $model,
    ]);
}

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
