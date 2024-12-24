<?php

namespace app\models;

use yii\db\ActiveRecord;

class Detail extends ActiveRecord
{
    /**
     * 返回与此 AR 类关联的数据库表名。
     *
     * @return string 表名
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * 定义模型的规则。
     *
     * @return array 验证规则
     */
    public function rules()
    {
        return [
            [['Name', 'Date', 'Magnitude', 'Depth', 'Longitude', 'Latitude', 'PlaceName'], 'safe'],
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
            'Name' => '名称',
            'Date' => '日期',
            'Magnitude' => '震级',
            'Depth' => '深度',
            'Longitude' => '经度',
            'Latitude' => '纬度',
            'PlaceName' => '震源地',
        ];
    }
}