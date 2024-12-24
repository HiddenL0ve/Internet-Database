<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;  // 引入 User 模型

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * Validates the user credentials.
     * This method checks whether the provided username and password match the stored ones.
     *
     * @return bool whether the user is authenticated or not.
     */
    public function login()
    {
        // 查询数据库中是否有该用户
        $user = User::findOne(['username' => $this->username]);

        // 检查用户名和密码是否匹配
        if ($user && $user->password === $this->password) {
            // 设置用户的登录信息
            Yii::$app->session->set('username', $this->username);
            return true;
        }

        return false;
    }

    /**
     * Logs the user out.
     */
    public function logout()
    {
        Yii::$app->session->remove('username');
    }
}
