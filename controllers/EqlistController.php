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

class EqlistController extends Controller
{
    public $layout = "main";
    public function actionIndex()
    {
        return $this->render('index');
    }
}
