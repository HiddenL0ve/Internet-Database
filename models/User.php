<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User 模型
 */
class User extends ActiveRecord implements IdentityInterface
{
    // 让表名是 user
    public static function tableName()
    {
        return 'user';
    }

    // IdentityInterface 要实现的四个方法

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // 如果不做 token 验证可直接 return null
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // 你可以在表里有个 auth_key 字段
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    // 自定义的
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    // 验证密码
    public function validatePassword($password)
    {
        // 如果你是明文存储，则直接对比
        // return $this->password === $password;

        // 如果你是哈希存储
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}