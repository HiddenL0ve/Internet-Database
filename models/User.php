<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    // 设置表名
    public static function tableName()
    {
        return '{{%user}}';
    }
}
