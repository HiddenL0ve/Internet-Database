<?php

namespace app\models;

use yii\db\ActiveRecord;

class Team extends ActiveRecord
{
    /**
     * 返回与此 AR 类关联的数据库表名。
     *
     * @return string 表名
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * 定义模型的验证规则。
     *
     * @return array 验证规则
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
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
            'content' => '内容',
        ];
    }
}
