<?php

namespace app\models;

use yii\db\ActiveRecord;

class Member extends ActiveRecord
{
    /**
     * 返回与此 AR 类关联的数据库表名。
     *
     * @return string 表名
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * 定义模型的验证规则。
     *
     * @return array 验证规则
     */
    public function rules()
    {
        return [
            [['name', 'age'], 'required'],
            ['age', 'integer', 'min' => 0],
            [['major'], 'string', 'max' => 100],
            [['bio'], 'string'],
            [['avatar'], 'string'],
        ];
    }

    /**
     * 定义属性标签。
     *
     * @return array 属性标签
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'age' => '年龄',
            'major' => '专业',
            'bio' => '个人简介',
            'avatar' => '头像'
        ];
    }
}
