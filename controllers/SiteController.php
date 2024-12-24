<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;  // 引入自定义 User 模型，用于操作数据库
use app\models\Member; // 假设你需要从 Member 模型获取成员数据
use app\models\Team;   // 假设你需要从 Team 模型获取团队数据
use app\models\Comments; // 假设你需要从 Comments 模型获取评论数据

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // 查询相关的模型数据
        $members = Member::find()->all(); // 获取所有成员
        $team = Team::findOne(1);         // 获取团队ID为1的团队
        $comments = Comments::find()->all(); // 获取所有评论

        return $this->render('index', [
            'members' => $members,
            'team' => $team,
            'comments' => $comments,
        ]);
    }

    /**
     * Login action.
     * 
     * 登录逻辑已修改为不依赖 Yii 内置的身份验证系统
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        // 如果用户已登录，直接跳转到首页
        //if (Yii::$app->session->get('username')) {
        //    return $this->goHome(); 
        //}

        // 创建 LoginForm 实例
        $model = new LoginForm();

        // 如果提交了表单
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/newpage']);  // 登录成功后返回上一页
        }

        $model->password = '';  // 清空密码字段，防止显示原密码

        // 渲染登录视图
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionNewpage()
    {
        return $this->render('newpage');  // 渲染 views/site/newpage.php
    }
    /**
     * 自定义的登录验证
     *
     * @return bool
     */
    public function actionCustomLogin()
    {
        $model = new LoginForm();

        // 处理 POST 请求
        if ($model->load(Yii::$app->request->post())) {
            // 验证用户名和明文密码
            $user = User::findOne(['username' => $model->username]);

            if ($user && $user->password === $model->password) {
                // 登录成功，保存 session
                Yii::$app->session->set('username', $model->username);
                return $this->goBack(); // 登录后返回上一页
            } else {
                // 如果验证失败，显示错误消息
                $model->addError('password', 'Incorrect username or password.');
            }
        }

        return $this->render('login', ['model' => $model]);
    }

    /**
     * Logout action.
     * 注销功能，清除 session 信息
     *
     * @return Response
     */
    public function actionLogout()
    {
        // 清除当前用户的登录信息
        Yii::$app->session->remove('username');
        return $this->goHome();  // 注销后跳转到首页
    }

    /**
     * Error action.
     *
     * @return string
     */
    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    /**
     * About page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Signup action.
     *
     * @return Response|string
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        // 注册功能
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $user = new User();
            $user->username = $model->username;
            $user->setPassword($model->password);  // 使用 setPassword 来加密密码
            $user->generateAuthKey();  // 生成 authKey

            if ($user->save()) {
                Yii::$app->session->setFlash('success', '注册成功!');
                return $this->redirect(['site/login']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}