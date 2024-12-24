<?php

namespace app\controllers;

use Yii; // 确保引入 Yii 类
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Member;
use app\models\Team;
use app\models\Comments;
use app\models\SignupForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $members = Member::find()->all();
        $team = Team::findOne(1);
        $comments = Comments::find()->all();

        return $this->render('index', [
            'members' => $members,
            'team' => $team,
            'comments' => $comments,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionSignup()
    {
        $model = new SignupForm();

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